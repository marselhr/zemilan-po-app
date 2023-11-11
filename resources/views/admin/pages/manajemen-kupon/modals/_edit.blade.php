<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="editCouponModal" tabindex="-1" role="dialog" aria-labelledby="editCouponModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCouponModalLabel">Edit Kupon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="editCouponForm" action="" method="post">
                    @csrf
                    @method('PUT')
                    <!-- Input -->
                    <div class="mb-3">
                        <label class="form-label" for="codeInput">Kode</label>
                        <input name="code" type="text" id="codeInput" class="form-control" disabled
                            placeholder="cth. KUPON-PEDAS">
                    </div>
                    <!-- Select Option -->
                    <div class="mb-3">
                        <label class="form-label" for="selectType">Tipe Kupon</label>
                        <select class="form-select" aria-label="Default select example" name="type" id="couponType">
                            <option selected>--> Pilih Tipe <-- </option>
                            <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed</option>
                            <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Percent</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="valueCouponInput">Nilai</label>
                        <input name="value" type="text" id="valueCouponInput" class="form-control"
                            placeholder="cth. 10.000">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    const valueInput = document.getElementById('valueCouponInput');
    const typeCoupon = document.getElementById('couponType');
    valueInput.addEventListener('input', function() {
        const couponValue = Number(valueInput.value.replace(/\./g, '').replace(',', '.'));
        if (!isNaN(couponValue) && typeCoupon.value === 'percent' && couponValue > 100) {
            valueInput.value = '100';
        } else {
            valueInput.value = couponValue.toLocaleString('id-ID', {
                minimumFractionDigits: 0
            });
        }
    });

    typeCoupon.addEventListener('change', function() {
        const couponValue = Number(valueInput.value.replace(/\./g, '').replace(',', '.'));
        if (!isNaN(couponValue) && typeCoupon.value === 'percent' && couponValue > 100) {
            valueInput.value = '0';
        }
    });
</script>
