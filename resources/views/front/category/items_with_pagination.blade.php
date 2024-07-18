<div class="col-span-9" id="category-items">
              @include('front.category.items', ['items' => $items])
              <div id="pagination-links">
                @include('front.category.pagination', ['items' => $items])
              </div>
            </div>