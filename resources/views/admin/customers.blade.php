@extends('layouts.app')  

@section('content')
    <div class="container">
        <h2 class="my-4">Customers</h2>
        
        <form action="{{ url('/search-user') }}" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" method="GET">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Search Users">
        </form>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Customer List</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone ?? 'N/A' }}</td>
                                            <td>{{ $user->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ url('delete-user', $user->id) }}" 
                                                   class="btn btn-info" 
                                                   onclick="return confirm('Are you sure you want to delete this user?')">
                                                   Delete User
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="text-center">
                                                    <img style="width: 25%; height: 25%;" src="/user/assets/imgs/no-search-result.png" alt="No search result">
                                                    <h4>No Users Found!</h4>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
