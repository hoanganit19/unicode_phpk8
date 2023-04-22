<form action="{{route('products-post')}}" method="post">
    <div>
        <label for="">Name</label>
        <input type="text" placeholder="Name..." name="name" value="{{old('name')}}" /> <br />
        <span style="color: red">{{getError('name')}}</span>
    </div>
    <div>
        <label for="">Email</label>
        <input type="text" placeholder="Email..." name="email" value="{{old('email')}}" /> <br />
        <span style="color: red">{{getError('email')}}</span>
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" placeholder="Password..." name="password" /> <br />
        <span style="color: red">{{getError('password')}}</span>
    </div>
    <div>
        <label for="">Confirm Password</label>
        <input type="password" placeholder="Confirm Password..." name="confirm_password" /> <br />
        <span style="color: red">{{getError('confirm_password')}}</span>
    </div>
    <button type="submit">Submit</button>
</form>