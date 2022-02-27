<?php

namespace RMM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film", indexes={@ORM\Index(name="idx_fk_language_id", columns={"language_id"}), @ORM\Index(name="idx_fk_original_language_id", columns={"original_language_id"}), @ORM\Index(name="idx_title", columns={"title"})})
 * @ORM\Entity
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(name="film_id", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $filmId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=128, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="release_year", type="date", nullable=true)
     */
    private $releaseYear;

    /**
     * @var bool
     *
     * @ORM\Column(name="rental_duration", type="boolean", nullable=false, options={"default"="3"})
     */
    private $rentalDuration = '3';

    /**
     * @var string
     *
     * @ORM\Column(name="rental_rate", type="decimal", precision=4, scale=2, nullable=false, options={"default"="4.99"})
     */
    private $rentalRate = '4.99';

    /**
     * @var int|null
     *
     * @ORM\Column(name="length", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="replacement_cost", type="decimal", precision=5, scale=2, nullable=false, options={"default"="19.99"})
     */
    private $replacementCost = '19.99';

    /**
     * @var string|null
     *
     * @ORM\Column(name="rating", type="string", length=0, nullable=true, options={"default"="G"})
     */
    private $rating = 'G';

    /**
     * @var string|null
     *
     * @ORM\Column(name="special_features", type="string", length=0, nullable=true)
     */
    private $specialFeatures;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var \Language
     *
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     * })
     */
    private $language;

    /**
     * @var \Language
     *
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="original_language_id", referencedColumnName="language_id")
     * })
     */
    private $originalLanguage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Actor", mappedBy="film")
     */
    private $actor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="film")
     * @ORM\JoinTable(name="film_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="film_id", referencedColumnName="film_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     *   }
     * )
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get filmId.
     *
     * @return int
     */
    public function getFilmId()
    {
        return $this->filmId;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Film
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Film
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set releaseYear.
     *
     * @param \DateTime|null $releaseYear
     *
     * @return Film
     */
    public function setReleaseYear($releaseYear = null)
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    /**
     * Get releaseYear.
     *
     * @return \DateTime|null
     */
    public function getReleaseYear()
    {
        return $this->releaseYear;
    }

    /**
     * Set rentalDuration.
     *
     * @param bool $rentalDuration
     *
     * @return Film
     */
    public function setRentalDuration($rentalDuration)
    {
        $this->rentalDuration = $rentalDuration;

        return $this;
    }

    /**
     * Get rentalDuration.
     *
     * @return bool
     */
    public function getRentalDuration()
    {
        return $this->rentalDuration;
    }

    /**
     * Set rentalRate.
     *
     * @param string $rentalRate
     *
     * @return Film
     */
    public function setRentalRate($rentalRate)
    {
        $this->rentalRate = $rentalRate;

        return $this;
    }

    /**
     * Get rentalRate.
     *
     * @return string
     */
    public function getRentalRate()
    {
        return $this->rentalRate;
    }

    /**
     * Set length.
     *
     * @param int|null $length
     *
     * @return Film
     */
    public function setLength($length = null)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length.
     *
     * @return int|null
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set replacementCost.
     *
     * @param string $replacementCost
     *
     * @return Film
     */
    public function setReplacementCost($replacementCost)
    {
        $this->replacementCost = $replacementCost;

        return $this;
    }

    /**
     * Get replacementCost.
     *
     * @return string
     */
    public function getReplacementCost()
    {
        return $this->replacementCost;
    }

    /**
     * Set rating.
     *
     * @param string|null $rating
     *
     * @return Film
     */
    public function setRating($rating = null)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating.
     *
     * @return string|null
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set specialFeatures.
     *
     * @param string|null $specialFeatures
     *
     * @return Film
     */
    public function setSpecialFeatures($specialFeatures = null)
    {
        $this->specialFeatures = $specialFeatures;

        return $this;
    }

    /**
     * Get specialFeatures.
     *
     * @return string|null
     */
    public function getSpecialFeatures()
    {
        return $this->specialFeatures;
    }

    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     *
     * @return Film
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate.
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Set language.
     *
     * @param \Language|null $language
     *
     * @return Film
     */
    public function setLanguage(\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return \Language|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set originalLanguage.
     *
     * @param \Language|null $originalLanguage
     *
     * @return Film
     */
    public function setOriginalLanguage(\Language $originalLanguage = null)
    {
        $this->originalLanguage = $originalLanguage;

        return $this;
    }

    /**
     * Get originalLanguage.
     *
     * @return \Language|null
     */
    public function getOriginalLanguage()
    {
        return $this->originalLanguage;
    }

    /**
     * Add actor.
     *
     * @param \Actor $actor
     *
     * @return Film
     */
    public function addActor(\Actor $actor)
    {
        $this->actor[] = $actor;

        return $this;
    }

    /**
     * Remove actor.
     *
     * @param \Actor $actor
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeActor(\Actor $actor)
    {
        return $this->actor->removeElement($actor);
    }

    /**
     * Get actor.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Add category.
     *
     * @param \Category $category
     *
     * @return Film
     */
    public function addCategory(\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category.
     *
     * @param \Category $category
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCategory(\Category $category)
    {
        return $this->category->removeElement($category);
    }

    /**
     * Get category.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }
}
