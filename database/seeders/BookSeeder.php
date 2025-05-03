<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Laravel: Up & Running',
                'author' => 'Matt Stauffer',
                'description' => 'A Framework for Building Modern PHP Apps',
                'year' => 2019,
                'publisher' => 'O\'Reilly Media',
            ],
            [
                'title' => 'Modern PHP',
                'author' => 'Josh Lockhart',
                'description' => 'New Features and Good Practices',
                'year' => 2015,
                'publisher' => 'O\'Reilly Media',
            ],
            [
                'title' => 'PHP: The Good Parts',
                'author' => 'Peter MacIntyre',
                'description' => 'Delivering the Best of PHP',
                'year' => 2010,
                'publisher' => 'O\'Reilly Media',
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'description' => 'A Handbook of Agile Software Craftsmanship',
                'year' => 2008,
                'publisher' => 'Prentice Hall',
            ],
            [
                'title' => 'Design Patterns',
                'author' => 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides',
                'description' => 'Elements of Reusable Object-Oriented Software',
                'year' => 1994,
                'publisher' => 'Addison-Wesley Professional',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}