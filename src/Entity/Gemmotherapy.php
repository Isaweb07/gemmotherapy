<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\GemmotherapyRepository;
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

#[ORM\Entity(repositoryClass: GemmotherapyRepository::class)]
#[ApiResource(operations: [
    new Get(
        uriTemplate: '/gemmotherapy/{id}',
    ),
    new GetCollection(),
    new Post(
        uriTemplate: '/admin/gemmotherapy', 
    ),
    new Put(
        uriTemplate: '/admin/gemmotherapy/{id}', 
    ),
    new Delete(
        uriTemplate: '/admin/gemmotherapy/{id}', 
    )
])]
class Gemmotherapy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $latinName = null;

    #[ORM\OneToMany(mappedBy: 'gemmotherapy', targetEntity: Posology::class, cascade: ["persist", "remove"])]
    private Collection $posologies;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    public function __construct()
    {
        $this->posologies = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getLatinName(): ?string
    {
        return $this->latinName;
    }

    public function setLatinName(?string $latinName): self
    {
        $this->latinName = $latinName;

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
            $posology->setGemmotherapy($this);
        }

        return $this;
    }

    public function removePosology(Posology $posology): self
    {
        if ($this->posologies->removeElement($posology)) {
            // set the owning side to null (unless already changed)
            if ($posology->getGemmotherapy() === $this) {
                $posology->setGemmotherapy(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
