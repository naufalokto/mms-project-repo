<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Service - Mifta Motor Sport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
        }

        h2 {
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 1rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
        }

        select, input, textarea {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }

        .btn-submit {
            background-color: #FE8400;
            color: #fff;
            font-weight: 600;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #e97500;
        }

        .chevron-back {
            margin: 1rem;
            display: inline-block;
        }
    </style>
</head>
<body>
    <a href="/" class="chevron-back">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 19L8 12L15 5" stroke="#FE8400" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>

    <div class="form-container">
        <h2>Booking Service</h2>
        <?php if($errors->any()): ?>
    <div style="background-color: #ffe0e0; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
        <ul style="color: #d00; list-style-type: disc; padding-left: 1.5rem;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

        <form method="POST" action="<?php echo e(route('service.store')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="tanggal">Tanggal Service</label>
                <input type="date" id="tanggal" name="tanggal" required>
            </div>

            <div class="form-group">
                <label for="id_cabang">Cabang</label>
                <select id="id_cabang" name="id_cabang" required>
                    <option value="">Pilih Cabang</option>
                    <?php $__currentLoopData = $cabangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cabang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cabang->id_cabang); ?>"><?php echo e($cabang->nama_cabang); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_tipe_service">Tipe Service</label>
                <select id="id_tipe_service" name="id_tipe_service" required>
                    <option value="">Pilih Tipe</option>
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($type->id_tipe_service); ?>"><?php echo e($type->nama_service); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <textarea id="keluhan" name="keluhan" rows="3"></textarea>
            </div>


            <div class="form-group">
                <label for="jadwal">Jam Service</label>
                <select id="jadwal" name="jadwal" required>
                    <option value="">Pilih Slot</option>
                </select>
                <div id="slot-error" style="color:#d00; margin-top:0.5rem; display:none;">Tidak ada slot tersedia untuk tanggal & cabang ini.</div>
            </div>


            <input type="hidden" name="id_pengguna" value="<?php echo e(Auth::user()->id_pengguna); ?>">


            <button type="submit" class="btn-submit">Simpan Booking</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dateInput = document.getElementById('tanggal');
            const cabangInput = document.getElementById('id_cabang');
            const jadwalSelect = document.getElementById('jadwal');
            const slotError = document.getElementById('slot-error');

            function updateSlot() {
                const date = dateInput.value;
                const cabang = cabangInput.value;
                if (!date || !cabang) return;

                fetch(`/validate-slot?date=${date}&id_cabang=${cabang}`)
                    .then(res => res.json())
                    .then(data => {
                        jadwalSelect.innerHTML = '<option value="">Pilih Slot</option>';
                        let available = false;
                        data.forEach(slot => {
                            const opt = document.createElement('option');
                            opt.value = slot.time;
                            opt.textContent = `${slot.time} ${!slot.available ? `(${slot.reason})` : ''}`;
                            opt.disabled = !slot.available;
                            if (slot.available) available = true;
                            jadwalSelect.appendChild(opt);
                        });
                        slotError.style.display = available ? 'none' : 'block';
                    });
            }

            dateInput.addEventListener('change', updateSlot);
            cabangInput.addEventListener('change', updateSlot);
        });
    </script>
</body>
</html>
<?php /**PATH P:\Coding Files Projects\mms-project-repo\resources\views/create.blade.php ENDPATH**/ ?>