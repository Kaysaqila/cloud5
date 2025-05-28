<div style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #121212;
    color: #e0e0e0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', Arial, sans-serif;
    z-index: 9999;
">
    <!-- Waiting content -->
    <div style="
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 1rem;
        color: #bb86fc;
    ">
        Menunggu Akses
    </div>
    
    <div style="
        font-size: 1.2rem;
        margin-bottom: 2rem;
        text-align: center;
        max-width: 80%;
    ">
        Harap tunggu persetujuan dari admin untuk melanjutkan.
    </div>
    
    <div style="
        width: 50px;
        height: 50px;
        border: 5px solid #333;
        border-top-color: #bb86fc;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    "></div>
    
    <!-- Action Buttons -->
    <div style="
        margin-top: 3rem;
        display: flex;
        gap: 1rem;
    ">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="
            padding: 0.75rem 1.5rem;
            background-color: #3700b3;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        ">
                Kembali
            </button>
        </form>
    </div>
    
    <div style="
        margin-top: 2rem;
        font-size: 0.9rem;
        color: #888;
    ">
        Jika menunggu terlalu lama, silakan hubungi administrator.
    </div>
</div>

<style>
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    button:hover {
        background-color: #b00020 !important;
    }
    
    a:hover {
        background-color: #6200ee !important;
    }
</style>