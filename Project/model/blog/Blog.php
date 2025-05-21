<?php

class Blog
{
    private $id;
    private $authorId;
    private $title;
    private $description;
    private $content;
    private $featuredImg;
    private $createdAt;
    private $updatedAt;
    private $isPublished;
    private $views;

    public function __construct($id, $authorId, $title, $description, $content, $featuredImg, $createdAt, $updatedAt, $isPublished, $views)
    {
        $this->id          = $id;
        $this->authorId    = $authorId;
        $this->title       = $title;
        $this->description = $description;
        $this->content     = $content;
        $this->featuredImg = $featuredImg;
        $this->createdAt   = $createdAt;
        $this->updatedAt   = $updatedAt;
        $this->isPublished = $isPublished;
        $this->views       = $views;
    }

    // Getter và Setter cho từng thuộc tính
    public function getId()
    {return $this->id;}
    public function getAuthorId()
    {return $this->authorId;}
    public function getTitle()
    {return $this->title;}
    public function getDescription()
    {return $this->description;}
    public function getContent()
    {return $this->content;}
    public function getFeaturedImg()
    {return $this->featuredImg;}
    public function getCreatedAt()
    {return $this->createdAt;}
    public function getUpdatedAt()
    {return $this->updatedAt;}
    public function getIsPublished()
    {return $this->isPublished;}
    public function getViews()
    {return $this->views;}

    public function setAuthorId($val)
    {$this->authorId = $val;}
    public function setTitle($val)
    {$this->title = $val;}
    public function setDescription($val)
    {$this->description = $val;}
    public function setContent($val)
    {$this->content = $val;}
    public function setFeaturedImg($val)
    {$this->featuredImg = $val;}
    public function setIsPublished($val)
    {$this->isPublished = $val;}
    public function setViews($val)
    {$this->views = $val;}
}
