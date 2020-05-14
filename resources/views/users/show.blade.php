<div class="card-columns">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">name</h4>
            <p class="card-text">{{ $data['name'] ?? '.....' }}</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">email</h4>
            <p class="card-text">{{ $data['email'] ?? '' }}</p>
        </div>
    </div>
</div>