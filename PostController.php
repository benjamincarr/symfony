<?php

namespace TripPlanneraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use TripPlanneraBundle\Document\Location;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Stopwatch\Stopwatch;

class PostController extends Controller
{
    /**
     * function postAction
     * @param $postId
     * @param Request $request
     * @return mixed
     */
    public function postAction($postId, Request $request)
    {

        $entity = $this->getRepository('post')->find($postId);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find post.');
        }

        $locationId = $entity->getLocationId();

        $location = $this->getRepository('Location')->find($locationId);

        $ancestors = $this->createQueryBuilder('Location')
            ->field('id')->in((array)$location->getAncestorsIds())
            ->getQuery()->execute();

        $categories = $this->createQueryBuilder('Category')
            ->sort('name', 'asc')
            ->getQuery()->execute();

        $categoriesList = array();
        foreach ($categories as $category) {
            $categoriesList[(string)$category->getId()] = $category;
        }
        $nearposts = array();
        if ($entity->getCoordinates()) {
            /*  $nearposts = $this->createQueryBuilder('post')
                  ->field('coordinates')
                  ->near($entity->getCoordinates()->getLongitude(), $entity->getCoordinates()->getLatitude())
                  ->limit(4)
                  ->getQuery()
                  ->execute();*/

        $near =
            array(
                '$near' => array(
                    '$geometry' => array(
                        "coordinates" => array(
                            $entity->getCoordinates()->getLongitude(),
                            $entity->getCoordinates()->getLatitude()
                        )
                    ),
                    '$maxDistance' => 1000,//meter
                )
            );
        $nearposts = $this->createQueryBuilder('post')
            ->field('coordinates')->equals($near)
            ->field("_id")->notEqual($entity->getId())
            ->sort('reviewsCount', 'desc')
            ->limit(4)
            ->getQuery()
            ->execute();

        $tours = $this->createQueryBuilder('Tour')
            ->field('postIds')->equals($postId)
            ->sort('id', 'desc')
            ->limit(4)
            ->getQuery()->execute();
        }

        $plansUsedIn = $this->createQueryBuilder('Plan')
            ->field('planItems.entityType')->equals('post')
            ->field('planItems.entityId')->equals($postId)
            ->field('isTemplate')->equals(true)
            ->sort('reviewsCount', 'desc')
            ->limit(4)
            ->getQuery()->execute();
        
        return $this->render('TripPlanneraBundle:post:post.html.twig', array(
            'entity' => $entity,
            'location' => $location,
            'ancestors' => $ancestors,
            'categoriesList' => $categoriesList,
            'nearposts' => $nearposts,
            'tours' => $tours,
            'plansUsedIn' => $plansUsedIn
        ));
    }
	
	/**
     * function locationpostsAction
     * @param $locationId
     * @param Request $request
     * @return mixed
     */

    public function locationpostsAction($locationId, Request $request)
    {
        $entity = $this->getRepository('Location')->find($locationId);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Location.');
        }
        $posts = $this->createQueryBuilder('post')
            ->field('locationId')->equals($locationId)
            ->sort('reviewsCount', 'desc')
            //->limit(24)
            ->getQuery()->execute();


        $postsList = array();
        $liipService = $this->get('liip_imagine.cache.manager');

        foreach ($posts as $post) {
            $postData = $post->toPublicArray();
            if ($postData['image']) {
                $postData['image'] = $liipService->getBrowserPath('media/images/' . $postData['image'],
                    'thumb_330x220');
            }else{
                unset($postData['image']);
            }

            $postsList[] = $postData;
        }

        $response = new JsonResponse();
        $response->setData(array(
            'posts' => $postsList
        ));
        return $response;

    }


}
