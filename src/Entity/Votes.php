<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Votes
 *
 * @ORM\Table(name="votes", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="post_id", columns={"post_id"})})
 * @ORM\Entity
 */
class Votes
{
    /**
     * @var int
     *
     * @ORM\Column(name="vote_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $voteId;

    /**
     * @var string
     *
     * @ORM\Column(name="vote_type", type="string", length=0, nullable=false)
     */
    private $voteType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

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
     * @var \Threads
     *
     * @ORM\ManyToOne(targetEntity="Threads")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post_id", referencedColumnName="thread_id")
     * })
     */
    private $post;


}
