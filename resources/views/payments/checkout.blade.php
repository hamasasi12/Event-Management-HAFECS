@extends('layouts.userDashboard')

@push('scripts')
    {{-- Midtrans Snap JS --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
@endpush

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root {
    --hafecs-blue: #1E3A8A;
    --hafecs-orange: #F97316;
    --hafecs-yellow: #FFD700;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--hafecs-blue);
    color: #1f2937;
    margin: 0;
    padding: 0;
}

/* === Container utama === */
.payment-wrapper {
    max-width: 1000px;
    margin: 2rem auto 4rem;
    background: transparent;
    padding: 0 1rem;
    min-height: calc(100vh - 200px);
}

.payment-header {
    text-align: center;
    color: white;
    margin-bottom: 1.5rem;
}

.payment-header h1 {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
}

.payment-header p {
    font-size: 0.95rem;
    opacity: 0.9;
    margin-top: 0;
}

/* === Dua kolom utama === */
.payment-box {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.section {
    flex: 1;
    min-width: 300px;
    background: linear-gradient(180deg, #FFF6B2, #FFE97F);
    border-radius: 1rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    padding: 1.75rem;
}

.section h2 {
    color: #1f2937;
    font-weight: 700;
    font-size: 1.2rem;
    border-bottom: 2px solid var(--hafecs-orange);
    display: inline-block;
    margin-bottom: 1rem;
    padding-bottom: 0.25rem;
}

/* === Metode Pembayaran === */
.method-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(90px, 1fr));
    gap: 1rem;
    justify-items: center;
    margin-top: 1rem;
    padding: 0 0.5rem;
}

.method-card {
    background: #fff;
    border-radius: 0.65rem;
    padding: 0.6rem 0.8rem;
    border: 2px solid transparent;
    transition: all 0.25s ease;
    cursor: pointer;
    text-align: center;
    width: 90px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.05);
}

.method-card:hover {
    border-color: var(--hafecs-orange);
    transform: translateY(-3px);
    box-shadow: 0 5px 12px rgba(0,0,0,0.1);
}

.method-card img {
    width: 38px;
    height: auto;
    margin-bottom: 0.35rem;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.method-card span {
    font-size: 0.8rem;
    font-weight: 600;
    color: #333;
    display: block;
}

/* === Ringkasan Pembayaran === */
.summary-box {
    background-color: #fff;
    border-radius: 0.75rem;
    padding: 1.5rem;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.summary-box h3 {
    font-weight: 700;
    font-size: 1.1rem;
    color: var(--hafecs-blue);
    margin-bottom: 0.75rem;
    margin-top: 0;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px dashed #ccc;
    padding: 0.5rem 0;
    font-size: 0.95rem;
    color: #374151;
    align-items: center;
}

.summary-row span {
    color: #6b7280;
}

.summary-row strong {
    color: #1f2937;
    text-align: right;
    word-break: break-word;
    max-width: 60%;
}

.summary-total {
    text-align: right;
    font-weight: 800;
    font-size: 1.4rem;
    color: var(--hafecs-orange);
    margin-top: 1.25rem;
    padding-top: 0.75rem;
    border-top: 2px solid #e5e7eb;
}

/* === Tombol Bayar === */
.pay-button {
    width: 100%;
    background: linear-gradient(90deg, var(--hafecs-orange), #f59e0b);
    color: white;
    font-weight: 700;
    font-size: 1.2rem;
    border: none;
    border-radius: 0.9rem;
    padding: 1.25rem;
    margin-top: 2rem;
    transition: all 0.3s ease;
    cursor: pointer;
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}

.pay-button:hover:not(:disabled) {
    transform: scale(1.05);
    background: linear-gradient(90deg, #f59e0b, var(--hafecs-orange));
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}

.pay-button:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

/* === Responsif === */
@media (max-width: 768px) {
    .payment-wrapper {
        margin: 1.2rem auto 3rem;
        padding: 0 0.75rem;
        min-height: auto;
    }

    .payment-header h1 {
        font-size: 1.6rem;
    }

    .payment-header p {
        font-size: 0.85rem;
    }

    .payment-box {
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .section {
        padding: 1.25rem;
        border-radius: 0.75rem;
    }

    .section h2 {
        font-size: 1rem;
        margin-bottom: 0.75rem;
    }

    .method-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75rem;
        margin-top: 0.5rem;
    }

    .method-card {
        width: 100%;
        max-width: 80px;
        padding: 0.5rem 0.6rem;
    }

    .method-card img {
        width: 34px;
        margin-bottom: 0.25rem;
    }

    .method-card span {
        font-size: 0.7rem;
    }

    .summary-box {
        padding: 1.25rem;
    }

    .summary-box h3 {
        font-size: 1rem;
    }

    .summary-row {
        font-size: 0.85rem;
        padding: 0.4rem 0;
    }

    .summary-row strong {
        max-width: 55%;
        font-size: 0.85rem;
    }

    .summary-total {
        font-size: 1.2rem;
        margin-top: 1rem;
        padding-top: 0.5rem;
    }

    .pay-button {
        font-size: 1rem;
        padding: 0.9rem;
        margin-top: 1.25rem;
        border-radius: 0.75rem;
    }

    .info-banner {
        font-size: 0.85rem;
        padding: 0.85rem 1rem;
        margin-top: 1rem;
    }
}

/* === Tambahan layar sangat kecil === */
@media (max-width: 480px) {
    .payment-wrapper {
        margin: 1rem auto 2rem;
    }

    .method-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 0.65rem;
    }

    .method-card {
        max-width: 75px;
        padding: 0.45rem;
    }

    .method-card img {
        width: 30px;
    }

    .method-card span {
        font-size: 0.65rem;
    }

    .pay-button {
        font-size: 0.95rem;
        padding: 0.85rem;
    }

    .summary-row strong {
        max-width: 50%;
        font-size: 0.8rem;
    }
}
</style>

<div class="payment-wrapper">
    <div class="payment-header">
        <h1> Pembayaran Webinar</h1>
        <p>Selesaikan pembayaran untuk mengonfirmasi pendaftaran Anda!</p>
    </div>

    <div class="payment-box">
        {{-- Kolom Kiri: Metode Pembayaran --}}
        <div class="section">
            <h2>Metode Pembayaran Tersedia</h2>
            <div class="method-grid">
                <div class="method-card">
                    <img src="{{ asset('images/admin/dana.png') }}" alt="DANA">
                    <span>DANA</span>
                </div>
                <div class="method-card">
                    <img src="{{ asset('images/admin/ovo.jpeg') }}" alt="OVO">
                    <span>OVO</span>
                </div>
                <div class="method-card">
                    <img src="{{ asset('images/admin/shopeepay.png') }}" alt="ShopeePay">
                    <span>ShopeePay</span>
                </div>
                <div class="method-card">
                    <img src="{{ asset('images/admin/virtualaccount.jpeg') }}" alt="VA">
                    <span>Virtual Account</span>
                </div>
                <div class="method-card">
                    <img src="{{ asset('images/admin/qris.jpeg') }}" alt="QRIS">
                    <span>QRIS</span>
                </div>
            </div>
            <button id="pay-button" class="pay-button">Bayar Sekarang</button>
        </div>

        {{-- Kolom Kanan: Ringkasan --}}
        <div class="section">
            <h2>Ringkasan Pembayaran</h2>
            <div class="summary-box">
                <h3>{{ $payment->webinar->judul ?? 'Webinar HAFECS' }}</h3>
                <div class="summary-row">
                    <span>Order ID</span>
                    <strong>{{ $payment->order_id }}</strong>
                </div>
                <div class="summary-row">
                    <span>Tanggal</span>
                    <strong>{{ $payment->created_at->format('d M Y, H:i') }}</strong>
                </div>
                <div class="summary-row">
                    <span>Status</span>
                    <strong style="color:#f59e0b;">⏳ Menunggu Pembayaran</strong>
                </div>
                <div class="summary-row">
                    <span>Nama</span>
                    <strong>{{ $payment->seminarRegistration->name ?? '-' }}</strong>
                </div>
                <div class="summary-row">
                    <span>Email</span>
                    <strong>{{ $payment->seminarRegistration->email ?? '-'  }}</strong>
                </div>
                <div class="summary-row">
                    <span>No. HP</span>
                    <strong>{{ $payment->seminarRegistration->phone ?? '-'  }}</strong>
                </div>
                <div class="summary-total">
                    Total: Rp {{ number_format($payment->amount, 0, ',', '.') }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const payButton = document.getElementById('pay-button');
const snapToken = {!! json_encode($snapToken) !!};
const orderId = {!! json_encode($payment->order_id ?? '') !!};
const finishUrlWithOrder = "{{ route('payments.finish', ['order_id' => 'REPLACE_ORDER_ID']) }}";

payButton.addEventListener('click', function() {
    payButton.disabled = true;
    payButton.innerText = "⏳ Memproses...";

    window.snap.pay(snapToken, {
        onSuccess: () => {
            window.location.href = finishUrlWithOrder.replace('REPLACE_ORDER_ID', orderId);
        },
        onPending: () => {
            alert('⏳ Pembayaran sedang diproses. Status: Pending.\n\nSilakan selesaikan pembayaran Anda.');
            payButton.disabled = false;
            payButton.innerText = "Bayar Sekarang";
        },
        onError: () => {
            alert('❌ Terjadi kesalahan saat pembayaran.\n\nSilakan coba lagi atau hubungi customer service.');
            payButton.disabled = false;
            payButton.innerText = "Bayar Sekarang";
        },
        onClose: () => {
            payButton.disabled = false;
            payButton.innerText = "Bayar Sekarang";
        }
    });
});
</script>

@endsection
