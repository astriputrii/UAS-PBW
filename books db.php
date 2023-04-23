<?php 
include_once(__DIR__.'/connection.php');
include_once(__DIR__.'/../models/book.php');

class BooksDB extends Connection
{
    public static function all()
    {
        $books = self::executeQuery("SELECT * FROM books");
        $booksArr = [];
        foreach ($books as $author) {
            $booksArr[] = new Book(
                $author['book_id'],
                $author['author_id'], 
                $author['isbn'], 
                $author['title'], 
                $author['total_pages'], 
                $author['rating'], 
                $author['ebook_url'], 
                $author['cover_url'], 
                $author['total_views']
            );
        }
        return $booksArr;
    }

    public static function get($book_id)
    {
        $books = self::executeQuery("SELECT * FROM books WHERE book_id = ?", array($book_id));
        $book = null;
        if (count($books) > 0) {
            $book = new Book(
                $books[0]['book_id'],
                $books[0]['author_id'], 
                $books[0]['isbn'], 
                $books[0]['title'], 
                $books[0]['total_pages'], 
                $books[0]['rating'], 
                $books[0]['ebook_url'], 
                $books[0]['cover_url'], 
                $books[0]['total_views']
            );
        }
        return $book;
    }
}
