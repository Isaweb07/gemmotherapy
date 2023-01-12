<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TreatmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;

#[ORM\Entity(repositoryClass: TreatmentRepository::class)]
#[ApiResource(operations: [
    new Get(
        uriTemplate: '/treatment/{id}',
    ),
    new GetCollection(),
    new Post(
        uriTemplate: '/admin/treatment', 
    ),
    new Put(
        uriTemplate: '/admin/treatment/{id}', 
    ),
    new Delete(
        uriTemplate: '/admin/treatment/{id}', 
    )
])]
class Treatment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $keywords = null;

    #[ORM\OneToMany(mappedBy: 'treatment', targetEntity: Posology::class, cascade: ["persist", "remove"])]
    private Collection $posologies;

    public function __construct()
    {
        $this->posologies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * @return Collection<int, Posology>
     */
    public function getPosologies(): Collection
    {
        return $this->posologies;
    }

    public function addPosology(Posology $posology): self
    {
        if (!$this->posologies->contains($posology)) {
            $this->posologies->add($posology);
            $posology->setTreatment($this);
        }

        return $this;
    }

    public function removePosology(Posology $posology): self
    {
        if ($this->posologies->removeElement($posology)) {
            // set the owning side to null (unless already changed)
            if ($posology->getTreatment() === $this) {
                $posology->setTreatment(null);
            }
        }

        return $this;
    }
}
