<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Symfony\Component\Validator\Constraints as Assert;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @author Barry Brands <barrybrands02@hotmail.com>
 * @category Entity
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @Assert\NotNull
     * @Assert\Uuid
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @Assert\NotNull
     * @Assert\Type("string")
     * @Assert\Length(
     *     max = 255
     * )
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Assert\NotNull
     * @Assert\Type("string")
     * @Assert\Length(
     *     max = 255
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @Assert\NotNull
     * @Assert\Type("string")
     * @Assert\Length(
     *     max = 255
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @Assert\NotNull
     * @Assert\Type("string")
     * @Assert\Length(
     *     max = 255
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @Assert\Type("string")
     * @Assert\Length(
     *     max = 255
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $size;

    /**
     * @Assert\NotNull
     * @Assert\Type("integer")
     * @Assert\Length(
     *     max = 255
     * )
     * @ORM\Column(type="integer", length=255)
     */
    private $price;

    /**
     * @Assert\NotNull
     * @Assert\Type("integer")
     * @Assert\Length(
     *     max = 2
     * )
     * @ORM\Column(type="integer", length=2)
     */
    private $taxPercentage;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $image = [];



    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTaxPercentage(): ?int
    {
        return $this->taxPercentage;
    }

    public function setTaxPercentage(int $taxPercentage): self
    {
        $this->taxPercentage = $taxPercentage;

        return $this;
    }

    public function getImage(): ?array
    {
        return $this->image;
    }

    public function setImage(?array $image): self
    {
        $this->image = $image;

        return $this;
    }
}
