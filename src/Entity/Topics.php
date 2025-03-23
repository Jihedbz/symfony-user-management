<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topics
 *
 * @ORM\Table(name="topics")
 * @ORM\Entity
 */
class Topics
{
    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $categoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="category_name", type="string", length=255, nullable=false)
     */
    private $categoryName;


}
