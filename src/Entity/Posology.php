<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PosologyRepository;
use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;

#[ORM\Entity(repositoryClass: PosologyRepository::class)]
#[ApiResource(operations: [
    new Get(
        uriTemplate: '/posology/{id}',
    ),
    new GetCollection(),
    new Post(
        uriTemplate: '/admin/posology', 
    ),
    new Put(
        uriTemplate: '/admin/posology/{id}', 
    ),
    new Delete(
        uriTemplate: '/admin/posology/{id}', 
    )
])]
class Posology
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dosage = null;

    #[ORM\ManyToOne(inversedBy: 'posologies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Treatment $treatment = null;

    #[ORM\ManyToOne(inversedBy: 'posologies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gemmotherapy $gemmotherapy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDosage(): ?string
    {
        return $this->dosage;
    }

    public function setDosage(?string $dosage): self
    {
        $this->dosage = $dosage;

        return $this;
    }

    public function getTreatment(): ?Treatment
    {
        return $this->treatment;
    }

    public function setTreatment(?Treatment $treatment): self
    {
        $this->treatment = $treatment;

        return $this;
    }

    public function getGemmotherapy(): ?Gemmotherapy
    {
        return $this->gemmotherapy;
    }

    public function setGemmotherapy(?Gemmotherapy $gemmotherapy): self
    {
        $this->gemmotherapy = $gemmotherapy;

        return $this;
    }
}
