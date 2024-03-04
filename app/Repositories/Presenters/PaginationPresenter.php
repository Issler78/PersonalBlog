<?php

namespace App\Repositories\Presenters;

use App\Repositories\Interfaces\PaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
    /**
     * @var stdClass[]
     */
    private array $items;

    public function __construct(
        protected LengthAwarePaginator $paginator
    )
    {
        $this->items = $this->resolveItems($this->paginator->items());
    }

    public function items(): array
    {
        return $this->paginator->items();
    }

    public function total(): int
    {
        return $this->paginator->total();
    }

    public function currentPage(): int
    {
        return $this->paginator->currentPage();
    }
    
    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }
    
    public function isLastPage(): bool
    {
        return $this->paginator->currentPage() === $this->paginator->lastPage();
    }

    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }

    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1;
    }

    private function resolveItems(array $items): array
    {
        $response = [];

        foreach($items as $item)
        {
            $stdClassObject = new stdClass;
            foreach($item->toArray() as $key => $value)
            {
                $stdClassObject->{$key} = $value;
            }

            array_push($response, $stdClassObject);
        }

        return $response;
    }
}
