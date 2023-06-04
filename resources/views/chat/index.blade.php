@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chat</div>

                    <div class="card-body">
                        <form action="{{ route('chat.store') }}" method="POST">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <label for="receiver" class="col-md-3 col-form-label text-md-right">Receiver:</label>
                                <div class="col-md-6">
                                    <select name="receiver" id="receiver" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="message" class="col-md-3 col-form-label text-md-right">Message:</label>
                                <div class="col-md-6">
                                    <textarea name="message" id="message" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
