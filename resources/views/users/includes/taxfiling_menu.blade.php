<div class="header">
    <a href="{{ url('/tax_filing') }}"
        class="btn @if (Request::is('tax_filing')) btn-primary @else btn-link @endif">1. Taxpayer info</a>
        <a href="{{ url('/tax_filing/incomeinf') }}"
        class="btn @if (Request::is('tax_filing/incomeinf')) btn-primary @else btn-link @endif">2. Upload your documents</a>
        <a href="{{ url('/tax_filing/spuosedoc') }}"
        class="btn @if (Request::is('tax_filing/spuosedoc')) btn-primary @else btn-link @endif">3. Upload your Spouse documents</a>
    <a href="{{ url('/tax_filing/bankdetails') }}"
        class="btn @if (Request::is('tax_filing/bankdetails')) btn-primary @else btn-link @endif">4. Refund & Due Payment</a>
</div>
