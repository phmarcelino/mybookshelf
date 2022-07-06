<?php

function paginate(int $total, int $page): array
{
    $numberOfPages = (int) ceil($total / 5);
    $arrPages = range(1, $numberOfPages);

    if ($numberOfPages < $page || $page < 1) {
        $page = 1;
    }

    $previousPage = $page - 1;
    $nextPage = $page + 1;

    if ($previousPage < 1) {
        $previousPage = null;
    }

    if ($nextPage > $numberOfPages) {
        $nextPage = null;
    }

    $pagination = [
        'current_page' => $page,
        'previous_page' => $previousPage,
        'next_page' => $nextPage,
        'pages' => $arrPages
    ];

    return $pagination;
}