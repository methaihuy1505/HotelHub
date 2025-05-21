<?php
class BlogRepository extends BaseRepository
{
    protected function fetchAll($condition = null)
    {
        global $conn;
        $blogs = [];
        $sql   = "SELECT * FROM blog";
        if ($condition) {
            $sql .= " WHERE $condition";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $blog = new Blog(
                    $row['id'],
                    $row['author_id'],
                    $row['title'],
                    $row['description'],
                    $row['content'],
                    $row['featured_img'],
                    $row['create_at'],
                    $row['update_at'],
                    $row['is_published'],
                    $row['views']
                );
                $blogs[] = $blog;
            }
        }
        return $blogs;
    }

    public function getAll()
    {
        return $this->fetchAll();
    }

    public function getByUserAccountId($userAccountID)
    {
        $condition = "author_id = $userAccountID";
        return $this->fetchAll($condition);
    }
    public function find($id)
    {
        $blogs = $this->fetchAll("id = '$id'");
        return current($blogs);
    }

    public function save($data)
    {
        global $conn;
        $authorId    = $data['author_id'];
        $title       = $data['title'];
        $description = $data['description'] ?? '';
        $content     = $data['content'] ?? '';
        $featuredImg = $data['featured_img'] ?? '';
        $isPublished = $data['is_published'] ?? 0;
        $views       = $data['views'] ?? 0;

        $sql = "INSERT INTO blog (author_id, title, description, content, featured_img, is_published, views)
                VALUES ('$authorId', '$title', '$description', '$content', '$featuredImg', $isPublished, $views)";

        if ($conn->query($sql) === true) {
            return $conn->insert_id;
        }
        $this->error = "Error: " . $sql . "\n" . $conn->error;
        return false;
    }

    public function update($blog)
    {
        global $conn;
        $id          = $blog->getId();
        $authorId    = $blog->getAuthorId();
        $title       = $blog->getTitle();
        $description = $blog->getDescription();
        $content     = $blog->getContent();
        $featuredImg = $blog->getFeaturedImg();
        $isPublished = $blog->getIsPublished();
        $views       = $blog->getViews();

        $sql = "UPDATE blog SET
                    author_id='$authorId',
                    title='$title',
                    description='$description',
                    content='$content',
                    featured_img='$featuredImg',
                    is_published=$isPublished,
                    views=$views
                WHERE id='$id'";

        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . "\n" . $conn->error;
        return false;
    }

    public function delete($blog)
    {
        global $conn;
        $id  = $blog->getId();
        $sql = "DELETE FROM blog WHERE id='$id'";
        if ($conn->query($sql) === true) {
            return true;
        }
        $this->error = "Error: " . $sql . "\n" . $conn->error;
        return false;
    }
}
