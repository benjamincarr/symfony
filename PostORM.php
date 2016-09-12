<?php
namespace TripPlanneraBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbeddedDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbedOne;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbedMany;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Index;
/**
 * @MongoDB\Document(collection="posts")
 */
class Post
{
    /**
     * @MongoDB\Id
     */
    protected $id;


    /**
     * @MongoDB\String
     */
    protected $locationId;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\Float
     */
    protected $rating;

    /**
     * @MongoDB\Int
     */
    protected $reviewsCount;

    /**
     * @MongoDB\Int @Index
     */
    protected $itemId;

    /**
     * @MongoDB\String
     */
    protected $googlePlaceId;

    /** @EmbedOne(targetDocument="Coordinates") */
    public $googleCoordinates;

    /**
     * @MongoDB\Int
     */
    protected $itemLocationId;

    /**
     * @MongoDB\Collection @Index
     */
    protected $categoryIds = array();

    /**
     * @MongoDB\Boolean
     */
    protected $itemParsed;

    /** @EmbedOne(targetDocument="Coordinates") */
    public $itemCoordinates;

    /**
     * @MongoDB\String
     */
    protected $itemAddress;

    /**
     * @MongoDB\String
     */
    protected $itempostalCode;

    /**
     * @MongoDB\String
     */
    protected $itemDescription;


    /**
     * @MongoDB\String
     */
    protected $itemPhoneNumber;

    /**
     * @MongoDB\String
     */
    protected $itemRecommendedLength;

    /**
     * @MongoDB\Boolean
     */
    protected $itemFee;

    /**
     * @MongoDB\Collection
     */
    protected $itemHours;


    /**
     * @MongoDB\Collection
     */
    protected $itemDetails;

    /**
     * @MongoDB\String
     */
    protected $wikipediaUrl;

    /**
     * @MongoDB\String
     */
    protected $lonelyplanetUrl;

    /**
     * @MongoDB\String
     */
    protected $description;

    /**
     * @MongoDB\String
     */
    protected $mainImage;

    /**
     * @MongoDB\String
     */
    protected $mainImageLocal;


    /**
     * @MongoDB\Collection
     */
    protected $images = array();

    /**
     * @MongoDB\Collection
     */
    protected $imagesLocal = array();

    /**
     * @MongoDB\String
     */
    protected $notes;

    /**
     * @MongoDB\String
     */
    protected $googlePhoneNumber;

    /**
     * @MongoDB\String
     */
    protected $googleAddress;

    /**
     * @MongoDB\String
     */
    protected $googlepostalCode;
    /**
     * @MongoDB\String
     */
    protected $googleWebsite;

    /**
     * @MongoDB\Float
     */
    protected $googleRating;

    /**
     * @MongoDB\Int
     */
    protected $googleReviewsCount;

    /** @EmbedOne(targetDocument="Coordinates") */
    public $coordinates;

    /**
     * @MongoDB\String
     */
    protected $address;
    /**
     * @MongoDB\String
     */
    protected $postalCode;

    /**
     * @MongoDB\String
     */
    protected $phoneNumber;

    /**
     * @MongoDB\Collection
     */
    protected $workingHours;

    /**
     * @MongoDB\Hash
     */
    protected $openHours;

    /**
     * @MongoDB\Int
     */
    protected $length;

    /**
     * @MongoDB\Collection
     */
    protected $websites = array();

    /**
     * @MongoDB\String
     */
    protected $lonelyplanetPhoneNumber;

    /**
     * @MongoDB\String
     */
    protected $lonelyplanetAddress;

    /**
     * @MongoDB\String
     */
    protected $lonelyplanetWebsite;

    /**
     * @MongoDB\String
     */
    protected $lonelyplanetPrices;


    /**
     * @MongoDB\String
     */
    protected $lonelyplanetHours;

    /**
     * @MongoDB\Boolean
     */
    protected $lonelyplanetParsed;
/**
 * 
 */
    public function toPublicArray()
    {
        return array("id" => $this->getId(),
            "name" => $this->getName(),
            "rating" => $this->getRating(),
            "reviewsCount" => $this->getReviewsCount(),
            "categoryIds" => $this->getCategoryIds(),
            "image"=>$this->getMainImageLocal(),
            "length" => $this->getLength(),
            "openHours" => $this->getOpenHours(),
        );

    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set itemId
     *
     * @param int $itemId
     * @return self
     */
    public function setitemId($itemId)
    {
        $this->itemId = $itemId;
        return $this;
    }

    /**
     * Get itemId
     *
     * @return int $itemId
     */
    public function getitemId()
    {
        return $this->itemId;
    }


    public function __construct()
    {
    }

    /**
     * Set rating
     *
     * @param float $rating
     * @return self
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * Get rating
     *
     * @return float $rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set reviewsCount
     *
     * @param int $reviewsCount
     * @return self
     */
    public function setReviewsCount($reviewsCount)
    {
        $this->reviewsCount = $reviewsCount;
        return $this;
    }

    /**
     * Get reviewsCount
     *
     * @return int $reviewsCount
     */
    public function getReviewsCount()
    {
        return $this->reviewsCount;
    }

    /**
     * Set categoryIds
     *
     * @param collection $categoryIds
     * @return self
     */
    public function setCategoryIds($categoryIds)
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * Get categoryIds
     *
     * @return collection $categoryIds
     */
    public function getCategoryIds()
    {
        return $this->categoryIds;
    }

    /**
     * Set googlePlaceId
     *
     * @param string $googlePlaceId
     * @return self
     */
    public function setGooglePlaceId($googlePlaceId)
    {
        $this->googlePlaceId = $googlePlaceId;
        return $this;
    }

    /**
     * Get googlePlaceId
     *
     * @return string $googlePlaceId
     */
    public function getGooglePlaceId()
    {
        return $this->googlePlaceId;
    }

    /**
     * Set googleCoordinates
     *
     * @param TripPlanneraBundle\Document\Coordinates $googleCoordinates
     * @return self
     */
    public function setGoogleCoordinates(\TripPlanneraBundle\Document\Coordinates $googleCoordinates)
    {
        $this->googleCoordinates = $googleCoordinates;
        return $this;
    }

    /**
     * Get googleCoordinates
     *
     * @return TripPlanneraBundle\Document\Coordinates $googleCoordinates
     */
    public function getGoogleCoordinates()
    {
        return $this->googleCoordinates;
    }

    /**
     * Set locationId
     *
     * @param string $locationId
     * @return self
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
        return $this;
    }

    /**
     * Get locationId
     *
     * @return string $locationId
     */
    public function getLocationId()
    {
        return $this->locationId;
    }


    /**
     * Set itemParsed
     *
     * @param boolean $itemParsed
     * @return self
     */
    public function setitemParsed($itemParsed)
    {
        $this->itemParsed = $itemParsed;
        return $this;
    }

    /**
     * Get itemParsed
     *
     * @return boolean $itemParsed
     */
    public function getitemParsed()
    {
        return $this->itemParsed;
    }

    /**
     * Set itemCoordinates
     *
     * @param TripPlanneraBundle\Document\Coordinates $itemCoordinates
     * @return self
     */
    public function setitemCoordinates(\TripPlanneraBundle\Document\Coordinates $itemCoordinates)
    {
        $this->itemCoordinates = $itemCoordinates;
        return $this;
    }

    /**
     * Get itemCoordinates
     *
     * @return TripPlanneraBundle\Document\Coordinates $itemCoordinates
     */
    public function getitemCoordinates()
    {
        return $this->itemCoordinates;
    }

    /**
     * Set itemAddress
     *
     * @param string $itemAddress
     * @return self
     */
    public function setitemAddress($itemAddress)
    {
        $this->itemAddress = $itemAddress;
        return $this;
    }

    /**
     * Get itemAddress
     *
     * @return string $itemAddress
     */
    public function getitemAddress()
    {
        return $this->itemAddress;
    }

    /**
     * Set itempostalCode
     *
     * @param string $itempostalCode
     * @return self
     */
    public function setitempostalCode($itempostalCode)
    {
        $this->itempostalCode = $itempostalCode;
        return $this;
    }

    /**
     * Get itempostalCode
     *
     * @return string $itempostalCode
     */
    public function getitempostalCode()
    {
        return $this->itempostalCode;
    }

    /**
     * Set itemDescription
     *
     * @param string $itemDescription
     * @return self
     */
    public function setitemDescription($itemDescription)
    {
        $this->itemDescription = $itemDescription;
        return $this;
    }

    /**
     * Get itemDescription
     *
     * @return string $itemDescription
     */
    public function getitemDescription()
    {
        return $this->itemDescription;
    }

    /**
     * Set itemPhoneNumber
     *
     * @param string $itemPhoneNumber
     * @return self
     */
    public function setitemPhoneNumber($itemPhoneNumber)
    {
        $this->itemPhoneNumber = $itemPhoneNumber;
        return $this;
    }

    /**
     * Get itemPhoneNumber
     *
     * @return string $itemPhoneNumber
     */
    public function getitemPhoneNumber()
    {
        return $this->itemPhoneNumber;
    }

    /**
     * Set itemRecommendedLength
     *
     * @param string $itemRecommendedLength
     * @return self
     */
    public function setitemRecommendedLength($itemRecommendedLength)
    {
        $this->itemRecommendedLength = $itemRecommendedLength;
        return $this;
    }

    /**
     * Get itemRecommendedLength
     *
     * @return string $itemRecommendedLength
     */
    public function getitemRecommendedLength()
    {
        return $this->itemRecommendedLength;
    }

    /**
     * Set itemFee
     *
     * @param boolean $itemFee
     * @return self
     */
    public function setitemFee($itemFee)
    {
        $this->itemFee = $itemFee;
        return $this;
    }

    /**
     * Get itemFee
     *
     * @return boolean $itemFee
     */
    public function getitemFee()
    {
        return $this->itemFee;
    }

    /**
     * Set itemHours
     *
     * @param collection $itemHours
     * @return self
     */
    public function setitemHours($itemHours)
    {
        $this->itemHours = $itemHours;
        return $this;
    }

    /**
     * Get itemHours
     *
     * @return collection $itemHours
     */
    public function getitemHours()
    {
        return $this->itemHours;
    }

    /**
     * Set itemDetails
     *
     * @param collection $itemDetails
     * @return self
     */
    public function setitemDetails($itemDetails)
    {
        $this->itemDetails = $itemDetails;
        return $this;
    }

    /**
     * Get itemDetails
     *
     * @return collection $itemDetails
     */
    public function getitemDetails()
    {
        return $this->itemDetails;
    }

    /**
     * Set mainImage
     *
     * @param string $mainImage
     * @return self
     */
    public function setMainImage($mainImage)
    {
        $this->mainImage = $mainImage;
        return $this;
    }

    /**
     * Get mainImage
     *
     * @return string $mainImage
     */
    public function getMainImage()
    {
        return $this->mainImage;
    }

    /**
     * Set images
     *
     * @param collection $images
     * @return self
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    /**
     * Get images
     *
     * @return collection $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set wikipediaUrl
     *
     * @param string $wikipediaUrl
     * @return self
     */
    public function setWikipediaUrl($wikipediaUrl)
    {
        $this->wikipediaUrl = $wikipediaUrl;
        return $this;
    }

    /**
     * Get wikipediaUrl
     *
     * @return string $wikipediaUrl
     */
    public function getWikipediaUrl()
    {
        return $this->wikipediaUrl;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * Get notes
     *
     * @return string $notes
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set itemLocationId
     *
     * @param int $itemLocationId
     * @return self
     */
    public function setitemLocationId($itemLocationId)
    {
        $this->itemLocationId = $itemLocationId;
        return $this;
    }

    /**
     * Get itemLocationId
     *
     * @return int $itemLocationId
     */
    public function getitemLocationId()
    {
        return $this->itemLocationId;
    }

    /**
     * Set lonelyplanetUrl
     *
     * @param string $lonelyplanetUrl
     * @return self
     */
    public function setLonelyplanetUrl($lonelyplanetUrl)
    {
        $this->lonelyplanetUrl = $lonelyplanetUrl;
        return $this;
    }

    /**
     * Get lonelyplanetUrl
     *
     * @return string $lonelyplanetUrl
     */
    public function getLonelyplanetUrl()
    {
        return $this->lonelyplanetUrl;
    }

    /**
     * Set googlePhoneNumber
     *
     * @param string $googlePhoneNumber
     * @return self
     */
    public function setGooglePhoneNumber($googlePhoneNumber)
    {
        $this->googlePhoneNumber = $googlePhoneNumber;
        return $this;
    }

    /**
     * Get googlePhoneNumber
     *
     * @return string $googlePhoneNumber
     */
    public function getGooglePhoneNumber()
    {
        return $this->googlePhoneNumber;
    }

    /**
     * Set googleAddress
     *
     * @param string $googleAddress
     * @return self
     */
    public function setGoogleAddress($googleAddress)
    {
        $this->googleAddress = $googleAddress;
        return $this;
    }

    /**
     * Get googleAddress
     *
     * @return string $googleAddress
     */
    public function getGoogleAddress()
    {
        return $this->googleAddress;
    }

    /**
     * Set googleWebsite
     *
     * @param string $googleWebsite
     * @return self
     */
    public function setGoogleWebsite($googleWebsite)
    {
        $this->googleWebsite = $googleWebsite;
        return $this;
    }

    /**
     * Get googleWebsite
     *
     * @return string $googleWebsite
     */
    public function getGoogleWebsite()
    {
        return $this->googleWebsite;
    }

    /**
     * Set googleRating
     *
     * @param float $googleRating
     * @return self
     */
    public function setGoogleRating($googleRating)
    {
        $this->googleRating = $googleRating;
        return $this;
    }

    /**
     * Get googleRating
     *
     * @return float $googleRating
     */
    public function getGoogleRating()
    {
        return $this->googleRating;
    }

    /**
     * Set googleReviewsCount
     *
     * @param int $googleReviewsCount
     * @return self
     */
    public function setGoogleReviewsCount($googleReviewsCount)
    {
        $this->googleReviewsCount = $googleReviewsCount;
        return $this;
    }

    /**
     * Get googleReviewsCount
     *
     * @return int $googleReviewsCount
     */
    public function getGoogleReviewsCount()
    {
        return $this->googleReviewsCount;
    }

    /**
     * Set coordinates
     *
     * @param TripPlanneraBundle\Document\Coordinates $coordinates
     * @return self
     */
    public function setCoordinates(\TripPlanneraBundle\Document\Coordinates $coordinates)
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    /**
     * Get coordinates
     *
     * @return TripPlanneraBundle\Document\Coordinates $coordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Set length
     *
     * @param int $length
     * @return self
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * Get length
     *
     * @return int $length
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set mainImageLocal
     *
     * @param string $mainImageLocal
     * @return self
     */
    public function setMainImageLocal($mainImageLocal)
    {
        $this->mainImageLocal = $mainImageLocal;
        return $this;
    }

    /**
     * Get mainImageLocal
     *
     * @return string $mainImageLocal
     */
    public function getMainImageLocal()
    {
        return $this->mainImageLocal;
    }

    /**
     * Set imagesLocal
     *
     * @param collection $imagesLocal
     * @return self
     */
    public function setImagesLocal($imagesLocal)
    {
        $this->imagesLocal = $imagesLocal;
        return $this;
    }

    /**
     * Get imagesLocal
     *
     * @return collection $imagesLocal
     */
    public function getImagesLocal()
    {
        return $this->imagesLocal;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Get address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * Set workingHours
     *
     * @param collection $workingHours
     * @return self
     */
    public function setWorkingHours($workingHours)
    {
        $this->workingHours = $workingHours;
        return $this;
    }

    /**
     * Get workingHours
     *
     * @return collection $workingHours
     */
    public function getWorkingHours()
    {
        return $this->workingHours;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string $phoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set lonelyplanetPhoneNumber
     *
     * @param string $lonelyplanetPhoneNumber
     * @return self
     */
    public function setLonelyplanetPhoneNumber($lonelyplanetPhoneNumber)
    {
        $this->lonelyplanetPhoneNumber = $lonelyplanetPhoneNumber;
        return $this;
    }

    /**
     * Get lonelyplanetPhoneNumber
     *
     * @return string $lonelyplanetPhoneNumber
     */
    public function getLonelyplanetPhoneNumber()
    {
        return $this->lonelyplanetPhoneNumber;
    }

    /**
     * Set lonelyplanetAddress
     *
     * @param string $lonelyplanetAddress
     * @return self
     */
    public function setLonelyplanetAddress($lonelyplanetAddress)
    {
        $this->lonelyplanetAddress = $lonelyplanetAddress;
        return $this;
    }

    /**
     * Get lonelyplanetAddress
     *
     * @return string $lonelyplanetAddress
     */
    public function getLonelyplanetAddress()
    {
        return $this->lonelyplanetAddress;
    }

    /**
     * Set lonelyplanetWebsite
     *
     * @param string $lonelyplanetWebsite
     * @return self
     */
    public function setLonelyplanetWebsite($lonelyplanetWebsite)
    {
        $this->lonelyplanetWebsite = $lonelyplanetWebsite;
        return $this;
    }

    /**
     * Get lonelyplanetWebsite
     *
     * @return string $lonelyplanetWebsite
     */
    public function getLonelyplanetWebsite()
    {
        return $this->lonelyplanetWebsite;
    }

    /**
     * Set lonelyplanetPrices
     *
     * @param string $lonelyplanetPrices
     * @return self
     */
    public function setLonelyplanetPrices($lonelyplanetPrices)
    {
        $this->lonelyplanetPrices = $lonelyplanetPrices;
        return $this;
    }

    /**
     * Get lonelyplanetPrices
     *
     * @return string $lonelyplanetPrices
     */
    public function getLonelyplanetPrices()
    {
        return $this->lonelyplanetPrices;
    }

    /**
     * Set lonelyplanetHours
     *
     * @param string $lonelyplanetHours
     * @return self
     */
    public function setLonelyplanetHours($lonelyplanetHours)
    {
        $this->lonelyplanetHours = $lonelyplanetHours;
        return $this;
    }

    /**
     * Get lonelyplanetHours
     *
     * @return string $lonelyplanetHours
     */
    public function getLonelyplanetHours()
    {
        return $this->lonelyplanetHours;
    }

    /**
     * Set lonelyplanetParsed
     *
     * @param boolean $lonelyplanetParsed
     * @return self
     */
    public function setLonelyplanetParsed($lonelyplanetParsed)
    {
        $this->lonelyplanetParsed = $lonelyplanetParsed;
        return $this;
    }

    /**
     * Get lonelyplanetParsed
     *
     * @return boolean $lonelyplanetParsed
     */
    public function getLonelyplanetParsed()
    {
        return $this->lonelyplanetParsed;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return self
     */
    public function setpostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string $postalCode
     */
    public function getpostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set websites
     *
     * @param collection $websites
     * @return self
     */
    public function setWebsites($websites)
    {
        $this->websites = $websites;
        return $this;
    }

    /**
     * Get websites
     *
     * @return collection $websites
     */
    public function getWebsites()
    {
        return $this->websites;
    }

    /**
     * Set googlepostalCode
     *
     * @param string $googlepostalCode
     * @return self
     */
    public function setGooglepostalCode($googlepostalCode)
    {
        $this->googlepostalCode = $googlepostalCode;
        return $this;
    }

    /**
     * Get googlepostalCode
     *
     * @return string $googlepostalCode
     */
    public function getGooglepostalCode()
    {
        return $this->googlepostalCode;
    }


    /**
     * Set openHours
     *
     * @param hash $openHours
     * @return self
     */
    public function setOpenHours($openHours)
    {
        $this->openHours = $openHours;
        return $this;
    }

    /**
     * Get openHours
     *
     * @return hash $openHours
     */
    public function getOpenHours()
    {
        return $this->openHours;
    }
}
