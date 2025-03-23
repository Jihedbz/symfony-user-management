<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Threads
 *
 * @ORM\Table(name="threads", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="category_id", columns={"category_id"})})
 * @ORM\Entity
 */
class Threads
{
    /**
     * @var int
     *
     * @ORM\Column(name="thread_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $threadId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @var \Topics
     *
     * @ORM\ManyToOne(targetEntity="Topics")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     * })
     */
    private $category;


}
