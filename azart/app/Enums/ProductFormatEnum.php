<?php
namespace App\Enums;

enum ProductFormatEnum: string {
    case SOFTCOVER = 'softcover';
    case HARDCOVER = 'hardcover';
    case EBOOK = 'ebook';
}
