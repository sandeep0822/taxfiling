<div class="header">
    
    <a href="{{ url('/Settings/Edit_Profile') }}"
        class="btn @if (Request::is('Referral/Edit_Profile')) btn-primary @else btn-link @endif">Edit_Profile</a>
    <a href="{{ url('/Settings/Change_Password') }}"
        class="btn @if (Request::is('Referral/Change_Password')) btn-primary @else btn-link @endif">Change_Password</a>
    
    
</div>