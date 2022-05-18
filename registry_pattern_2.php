<?php
	
	//	The registry pattern. 
	//	The purpose of the registry pattern is to keep a single location 
	//	as storage for other classes. 
	
	//	The library
	class MyLibrary {
		
		//	Books array 
		private static $books;
		
		public function __construct(){
			self::$books = array();
		}
		
		//	Gets the first book found by author
		public function GetBookByAuthor($author){
			
			$foundBook = "NONE";
			
			foreach(self::$books as $book){
				
				if($book->bookAuthor == $author){
					
					$foundBook = $book;
					break;
					
				}
				
			}
			
			return $foundBook;
			
		}
		
		//	Adds a book to the collection
		public function AddBook($book){
			array_push(self::$books, $book);
		}
		
	}
	
	//	The book 
	class Book {
		
		public $bookTitle;
		public $bookAuthor;
		
		//	Constructor
		public function __construct($title, $author){
			
			$this->bookTitle = $title;
			$this->bookAuthor = $author;
			
		}
		
	}
	
	//	The librarian
	class Librarian extends MyLibrary {
		
		public $name;
		
		//	Constructor
		public function __construct(){
			$this->name = "Karen Somebody";
		}
		
		//	The librarian gets a book
		public function GetBook($bookAuthorRequest){
			
			$book = "DEFAULT";
			
			$book = $this->GetBookByAuthor($bookAuthorRequest);
			
			return $book;
			
		}
		
	}
	
	//	New library
	$mylib = new MyLibrary();
	
	//	Some books 
	$cnlww = new Book("Chronicles of Narnia Lion Witch and Wardrobe", "CS Lewis");
	$lotrtf = new Book("Lord Of The Rings Fellowship of the Ring", "JRR Tolkien");
	$hpps = new Book("Harry Potter Philosiphers Stone", "JK Rowling");
	$tcoc = new Book("The Call of Cthulhu", "HP Lovecraft");
	
	//	Add to library
	$mylib->AddBook($cnlww);
	$mylib->AddBook($lotrtf);
	$mylib->AddBook($hpps);
	$mylib->AddBook($tcoc);
	
	//	The librarian 
	$helpfulLibrarian = new Librarian();
	
	$bookRequest = $helpfulLibrarian->GetBook("HP Lovecraft");
	$bookRequest2 = $helpfulLibrarian->GetBook("Scooby Dooby Doo");
	
	var_dump($bookRequest);
	var_dump($bookRequest2);
	
	
?>