@extends('layout.app')

@section('content')

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="{{ route('register') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="container">
                <h1>Registration Form</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter name" name="name" >

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" >

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" >
                
                <label for="file"><b>Image</b></label>
                <input type="file" placeholder="select file" name="image" >

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Submit</button>
                </div>
            </div>
        </form>
    </div>

      {{-- section  --}}
      <button class="accordion">User List</button>
      <div class="panel">
         <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
         <table id="myTable">
            <tr class="header">
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
            
            @if (count($user) > 0)
               @foreach ($user as $data)
                  <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td>{{ $data->name ?? ''}}</td>
                     <td>{{ $data->email ?? ''}}</td>
                     <td align="right">
                        <a href="" type="button" class="btn btn-danger delete-button">Edit</a>
                        <a href="" type="button" class="btn btn-danger delete-button">Delete</a>
                    </td>
                    </td>
                  </tr> 
               @endforeach
            @endif
            
          </table>
      </div>
      <button class="accordion">About 3</button>
      <div class="panel">
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
@endsection
   
    