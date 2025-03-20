@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-bold">Tambah Sub Kriteria</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subcriteria.store') }}" method="POST">
                            @csrf
                            <div id="subcriteria-container">
                                <div class="row subcriteria-item">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kriteria</label>
                                            <select name="criteria_id[]" class="form-control" required>
                                                <option value="">-- Pilih Kriteria --</option>
                                                @foreach($criteria_select as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Sub Kriteria</label>
                                            <input type="text" class="form-control" name="sub_criteria[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Bobot</label>
                                            <input type="text" class="form-control" name="bobot[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end">
                                        <button type="button" class="btn btn-success add-subcriteria">+</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 class="text-bold">Tabel Perbandingan Sub Kriteria</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="comparison-table">
                                    <thead>
                                        <tr>
                                            <th>Sub Kriteria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row button-hitung">
                                <div class="col-12">
                                    <button type="button" id="calculate" class="button-save">Hitung Nilai
                                        Prioritas</button>
                                </div>
                            </div>
                            <div id="priority-values" class="mt-3"></div>
                            <div class="row button-hitung">
                                <div class="col-12">
                                    <button type="submit" id="save-db" class="button-save"
                                        style="display:none;">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function updateButtons() {
        let subcriteriaItems = document.querySelectorAll(".subcriteria-item");
        subcriteriaItems.forEach((item, index) => {
            let addButton = item.querySelector(".add-subcriteria");
            let removeButton = item.querySelector(".remove-subcriteria");

            if (!removeButton) {
                removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.className = "btn btn-danger remove-subcriteria";
                removeButton.textContent = "-";
                item.querySelector(".col-md-1").appendChild(removeButton);
            }

            addButton.style.display = (index === 0) ? "inline-block" : "none";
            removeButton.style.display = (index > 0) ? "inline-block" : "none";
        });
    }

    document.querySelector("#subcriteria-container").addEventListener("click", function(event) {
        if (event.target.classList.contains("add-subcriteria")) {
            let newSubcriteria = document.querySelector(".subcriteria-item").cloneNode(true);
            newSubcriteria.querySelector("input[name='sub_criteria[]']").value = "";
            newSubcriteria.querySelector("input[name='bobot[]']").value = "";
            document.querySelector("#subcriteria-container").appendChild(newSubcriteria);
            updateComparisonTable();
            updateButtons();
        } else if (event.target.classList.contains("remove-subcriteria")) {
            event.target.closest(".subcriteria-item").remove();
            updateComparisonTable();
            updateButtons();
        }
    });

    function updateComparisonTable() {
        let subcriteriaNames = Array.from(document.querySelectorAll("input[name='sub_criteria[]']"))
            .map(input => input.value.trim()).filter(name => name !== "");

        let table = document.querySelector("#comparison-table");
        let thead = table.querySelector("thead");
        let tbody = table.querySelector("tbody");

        thead.innerHTML = "";
        tbody.innerHTML = "";

        let headerRow = document.createElement("tr");

        let headerSubcriteria = document.createElement("th");
        headerSubcriteria.textContent = "Sub Kriteria";
        headerRow.appendChild(headerSubcriteria);

        subcriteriaNames.forEach(name => {
            let th = document.createElement("th");
            th.textContent = name;
            headerRow.appendChild(th);
        });

        thead.appendChild(headerRow);

        subcriteriaNames.forEach((name, rowIndex) => {
            let row = document.createElement("tr");

            let nameCell = document.createElement("td");
            let strongElement = document.createElement("strong");
            strongElement.textContent = name;
            nameCell.appendChild(strongElement);
            row.appendChild(nameCell);

            subcriteriaNames.forEach((_, colIndex) => {
                let cell = document.createElement("td");
                let input = document.createElement("input");
                input.type = "number";
                input.className = "form-control text-center comparison-input";
                input.step = "0.000000001";
                input.required = true;

                input.value = (rowIndex === colIndex) ? 1 : '';

                input.name = `nilai_perbandingan[${rowIndex}][${colIndex}]`;

                cell.appendChild(input);
                row.appendChild(cell);
            });

            // Menambahkan baris ke tbody
            tbody.appendChild(row);
        });
    }


    document.querySelector("#calculate").addEventListener("click", function() {
        let rows = document.querySelectorAll("#comparison-table tbody tr");
        let numSubCriteria = rows.length;
        let matrix = [];
        let columnTotals = Array(numSubCriteria).fill(0);

        // Membaca nilai dari input dan membentuk matriks perbandingan
        rows.forEach((row, rowIndex) => {
            let values = Array.from(row.querySelectorAll(".comparison-input")).map(input =>
                parseFloat(input.value) || 0);
            matrix.push(values);
        });

        // Menghitung total per kolom
        for (let col = 0; col < numSubCriteria; col++) {
            for (let row = 0; row < numSubCriteria; row++) {
                columnTotals[col] += matrix[row][col];
            }
        }


        // Normalisasi matriks
        let normalizedMatrix = [];
        let rowSums = Array(numSubCriteria).fill(0);
        for (let row = 0; row < numSubCriteria; row++) {
            normalizedMatrix[row] = [];
            for (let col = 0; col < numSubCriteria; col++) {
                let normalizedValue = matrix[row][col] / columnTotals[col];
                normalizedValue = normalizedValue;
                normalizedMatrix[row][col] = normalizedValue;
                rowSums[row] += normalizedValue;
            }
        }

        // Membatasi total row sums ke 9 digit
        rowSums = rowSums.map(value => parseFloat(value.toFixed(9)));

        // Menghitung total keseluruhan jumlah sub kriteria
        let totalSum = rowSums.reduce((sum, value) => sum + value, 0);
        totalSum = parseFloat(totalSum.toFixed(9));

        // Menghitung nilai prioritas
        let priorities = rowSums.map(value => parseFloat((value / totalSum).toFixed(9)));

        // Menemukan nilai prioritas tertinggi
        let maxPriority = Math.max(...priorities);

        // Membagi setiap nilai prioritas dengan nilai tertinggi
        let normalizedPriorities = priorities.map(priority =>
            parseFloat((priority / maxPriority).toFixed(9))
        );

        // Menampilkan hasil ke dalam input form
        let priorityHTML = "<h4><b>Nilai Prioritas</b></h4>";
        normalizedPriorities.forEach((value, index) => {
            priorityHTML +=
                `<div class="form-group">
                <label>Sub Kriteria ${index + 1}</label>
                <input type="text" name="nilai_prioritas[]" class="form-control" value="${value}" readonly>
            </div>`;
        });
        document.querySelector("#priority-values").innerHTML = priorityHTML;

        // Menyembunyikan tombol simpan jika belum ada data prioritas
        document.querySelector("#save-db").style.display = "block";
    });


    document.querySelector("#subcriteria-container").addEventListener("input", updateComparisonTable);
    updateButtons();
});
</script>

@endsection