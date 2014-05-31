<?php 
namespace Blog\Entities;

/**
 * @Entity @Table(name="comments")
 */
final class Comment
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(type="text")
	 */
	private $comment;

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of comment.
     *
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }
    
    /**
     * Sets the value of comment.
     *
     * @param mixed $comment the comment
     *
     * @return self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }
}