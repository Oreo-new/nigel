<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group mr-4 mt-8 mb-4">
        <input type="text" class="form-control w-full border py-2 pl-3 rounded" name="search"
            placeholder="Search">
        </span>
    </div>
</form>