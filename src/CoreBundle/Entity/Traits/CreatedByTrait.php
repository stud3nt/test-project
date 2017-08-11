<?php

namespace CoreBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait CreatedByTrait
{
    /**
     * @var \CoreBundle\Entity\User\User
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\User\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    protected $createdBy;

    /**
     * Set user
     *
     * @param \CoreBundle\Entity\User\User $createdBy
     * @return $this
     */
    public function setCreatedBy(\CoreBundle\Entity\User\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \CoreBundle\Entity\User\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
