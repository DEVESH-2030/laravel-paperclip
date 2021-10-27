@extends('backend.layouts.app')
  
@section('content')
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <!-- ! Main -->

    <main class="main" id="skip-target">
      <div class="container">
        <div class="main-title-wrapper">
          <h2 class="main-title">Image Lists</h2>
          <a class="primary-default-btn" href="{{ route('upload-new') }}"><i data-feather="plus"></i>Add new</a>
        </div>
       
        <div class="row sort-bar ">
          <div class="col-lg-12">
            <div class="users-table table-wrapper">
              <table class="posts-table" style="margin-top:30px">
                <thead>
                  <tr class="users-table-info">
                  <th>
                    <label class="users-table__checkbox ms-20">
                    <input type="checkbox" class="check-all">Image
                    </label>
                  </th>
                  <th>Date</th>
                  <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($getAllImages as $getImage)
                    <tr>
                    <td>
                      <label class="users-table__checkbox">
                      <input type="checkbox" class="check">
                      <div class="categories-table-img">
                        <picture><source srcset="{{ asset('img/avatar/avatar-face-04.webp')}}" type="image/webp"><img src="{{ $getImage->image_file_name }}" alt="User Name"></picture>
                      </div>
                      </label>
                    </td>
                    <td>{{ $getImage->created_at ?? ''}}</td>
                    <td>
                      <span class="p-relative">
                      <button class="dropdown-btn transparent-btn" type="button" title="More info">
                        <div class="sr-only">More info</div>
                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                      </button>
                     <!-- edit -->
                     <!-- delete -->
                      <ul class="users-item-dropdown dropdown">
                        <li><a href="{{ route('edit',$getImage->id) }}">Edit</a></li>
                        <li><a href="#">Quick edit</a></li>
                        <li><a href="{{ route('delete', $getImage->id) }}"">Trash</a></li>
                      </ul>
                      </span>
                    </td>
                    </tr>
                    
                  @empty
                  No data availabel
                  @endforelse
                </tbody>
              </table>
              {{-- <!-- previous and next data -->
              <div class="d-flex justify-content-center text-right">
                {{ $getAllImages->links() }}
            </div> --}}
            </div>
          </div>
        </div>

        <div class="pagination-wrapper">
          <a class="pagination-prev disabled" href="##" title="Go to previous page"><i
              data-feather="arrow-left"></i></a>
          <ul class="pagination">
            <li><a class="active" href="##">1</a></li>
            <li><a href="##">2</a></li>
            <li><a href="##">3</a></li>
            <li><a href="##">4</a></li>
            <li><a href="##">5</a></li>
            <li><a href="##">...</a></li>
            <li><a href="##">10</a></li>
          </ul>
          <a class="pagination-next" href="##" title="Go to next page"><i data-feather="arrow-right"></i></a>
        </div>
      </div>
    </main>
@endsection
