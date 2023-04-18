<form action="{{route('products-post')}}" method="post">
    <div>
        <label for="">Email</label>
        <input type="text" placeholder="Email..." name="email" />
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" placeholder="Password..." name="password" />
    </div>
    <button type="submit">Submit</button>
</form>