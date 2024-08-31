<li class="nav-item">
    <a href="{{ url('/tax_filing') }}" class="nav-link  @if (Request::is('tax_filing')) active @endif">
        <i class="far fa-user nav-icon"></i>
        <p>Tax Payer Info</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('/tax_filing/taxsummary') }}" class="nav-link @if (Request::is('tax_filing/taxsummary')) active @else @endif">
        <i class="nav-icon fas fa-receipt"></i>
        <p>
            My Tax Summary
        </p>
    </a>
</li>
