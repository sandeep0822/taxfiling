<li class="nav-item">
    <a href="{{ url('/Referrals') }}" class="nav-link  @if (Request::is('Referrals')) active @endif">
        <i class="far fa-user nav-icon"></i>
        <p>Add Referrals</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('/Referrals/myrefferals') }}" class="nav-link  @if (Request::is('myrefferals')) active @else @endif">
        <i class="nav-icon fas fa-upload"></i>
        <p>
            My Referrals
        </p>
    </a>
</li>
<li class="nav-item">
    <!--<a href="<?php /*{{ url('/Referrals/Referral_Payment_Details') }} */?>" -->
    <a href="#" class="nav-link @if (Request::is('Referrals/Referral_Payment_Details')) active
@else @endif">
        <i class="nav-icon fas fa-receipt"></i>
        <p>
            Referral Payment Details
        </p>
    </a>
</li>
