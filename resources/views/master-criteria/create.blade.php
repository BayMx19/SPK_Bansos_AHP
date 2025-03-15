@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-bold">Tambah Kriteria</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('criteria.store') }}" method="POST">
                            @csrf
                            <div id="criteria-container">
                                <div class="row criteria-item">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Kode Kriteria</label>
                                            <input type="text" class="form-control" name="kode_criteria[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <input type="text" class="form-control" name="nama_criteria[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-success add-criteria">+</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4 class="text-bold">Tabel Perbandingan Kriteria</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="comparison-table">
                                    <thead>
                                        <tr>
                                            <th>Nama Kriteria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row button-hitung">
                                <div class="col-12 ">
                                    <button type="button" id="calculate" class="button-save">Hitung Nilai
                                        Prioritas</button>
                                </div>
                            </div>

                            <div id="priority-values" class="mt-3"></div>
                            <div class="row button-hitung">
                                <div class="col-12 ">
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
        let criteriaItems = document.querySelectorAll(".criteria-item");
        criteriaItems.forEach((item, index) => {
            let addButton = item.querySelector(".add-criteria");
            let removeButton = item.querySelector(".remove-criteria");

            if (!removeButton) {
                removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.className = "btn btn-danger remove-criteria";
                removeButton.textContent = "-";
                item.querySelector(".col-md-2").appendChild(removeButton);
            }

            addButton.style.display = (index === 0) ? "inline-block" : "none";
            removeButton.style.display = (index > 0) ? "inline-block" : "none";
        });
    }

    document.querySelector("#criteria-container").addEventListener("click", function(event) {
        if (event.target.classList.contains("add-criteria")) {
            let newCriteria = document.querySelector(".criteria-item").cloneNode(true);
            newCriteria.querySelector("input[name='kode_criteria[]']").value = "";
            newCriteria.querySelector("input[name='nama_criteria[]']").value = "";
            document.querySelector("#criteria-container").appendChild(newCriteria);
            updateComparisonTable();
            updateButtons();
        } else if (event.target.classList.contains("remove-criteria")) {
            event.target.closest(".criteria-item").remove();
            updateComparisonTable();
            updateButtons();
        }
    });

    function updateComparisonTable() {
        let criteriaNames = Array.from(document.querySelectorAll("input[name='nama_criteria[]']"))
            .map(input => input.value.trim()).filter(name => name !== "");
        let table = document.querySelector("#comparison-table");
        let thead = table.querySelector("thead");
        let tbody = table.querySelector("tbody");
        thead.innerHTML = "";
        tbody.innerHTML = "";

        let headerRow = document.createElement("tr");
        headerRow.innerHTML = "<th>Nama Kriteria</th>" + criteriaNames.map(name => `<th>${name}</th>`).join("");
        thead.appendChild(headerRow);

        criteriaNames.forEach((name, rowIndex) => {
            let row = document.createElement("tr");
            let rowContent = `<td><strong>${name}</strong></td>`;

            criteriaNames.forEach((_, colIndex) => {
                rowContent +=
                    `<td><input type="number" class="form-control text-center comparison-input" step="0.000000001" required value="${rowIndex === colIndex ? 1 : ''}"></td>`;
            });
            row.innerHTML = rowContent;
            tbody.appendChild(row);
        });
    }

    document.querySelector("#calculate").addEventListener("click", function() {
        let table = document.querySelector("#comparison-table");
        let rows = table.querySelectorAll("tbody tr");
        let numCriteria = rows.length;
        let totals = Array(numCriteria).fill(0);
        let matrix = [];

        rows.forEach((row, rowIndex) => {
            let values = Array.from(row.querySelectorAll(".comparison-input"))
                .map(input => parseFloat(input.value) || 0);
            totals[rowIndex] = values.reduce((sum, val) => sum + val, 0);
            matrix.push(values);
        });

        let normalizedMatrix = matrix.map((row, rowIndex) => row.map(value => value / totals[
            rowIndex]));
        let columnSums = Array(numCriteria).fill(0);

        normalizedMatrix.forEach(row => {
            row.forEach((value, colIndex) => {
                columnSums[colIndex] += value;
            });
        });

        let priorities = columnSums.map(sum => sum / numCriteria);

        let priorityHTML = "<h4><b>Nilai Prioritas</b></h4>";
        priorities.forEach((value, index) => {
            priorityHTML += `<div class="form-group">
                                    <label>Kriteria ${index + 1}</label>
                                    <input type="text" class="form-control" value="${value.toFixed(9)}" readonly>
                                 </div>`;
        });
        document.querySelector("#priority-values").innerHTML = priorityHTML;
        document.querySelector("#save-db").style.display = "block";
    });

    document.querySelector("#criteria-container").addEventListener("input", updateComparisonTable);
    updateButtons();
});
</script>
@endsection