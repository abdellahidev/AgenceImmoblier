<?php
/**
 * Created by PhpStorm.
 * User: abdellahi
 * Date: 28/12/18
 * Time: 23:17
 */

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class PropertySearch
{
    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     */
    private $minSurface;

    /**
     * @var ArrayCollection
     */
    private $lindicaps;

    public function __construct()
    {
        $this->lindicaps= new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice(int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * @param int|null $minSurface
     * @return PropertySearch
     */
    public function setMinSurface(int $minSurface): PropertySearch
    {
        $this->minSurface = $minSurface;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getLindicaps(): ArrayCollection
    {
        return $this->lindicaps;
    }

    /**
     * @param ArrayCollection $lindicaps
     */
    public function setLindicaps(ArrayCollection $lindicaps): void
    {
        $this->lindicaps = $lindicaps;
    }





}