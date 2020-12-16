@if (session()->has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<form wire:submit.prevent="submit">
    <div class="flex justify-center p-4 bg-gray-600 mt-0 w-auto">
        <input type="text" class="form-input w-full mx-10 p-2 rounded-full hover:bg-gray-200 focus:outline-none" wire:model="title" placeholder="What do you think?">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-full text-xs">Create new post</button>
    </div>
    @error('title') <span class="form-text text-danger error">{{ $message }}</span> @enderror
</form>

{{--        @foreach ($posts as $post)--}}
{{--        <div class="card border-dark mt-2">--}}
{{--            <div class="card-header">--}}
{{--                {{$post->title}}. By: {{$post->user->name}}--}}
{{--                <span class="badge badge-success">--}}
{{--                    {{$post->created_at->diffForHumans()}}--}}
{{--                </span>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <p>{{$post->description}}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @endforeach--}}

