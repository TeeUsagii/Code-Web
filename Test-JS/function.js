let danhSachCongNhan = []; // Mảng lưu trữ thông tin công nhân
        let selectedRowIndex = -1; // Chỉ mục dòng được chọn
        let isSuaMode = false; // Trạng thái sửa hoặc thêm mới

        // Hàm quyết định thao tác (Thêm hoặc Sửa)
        function quyetDinhThaoTac() {
            if (isSuaMode) {
                suaCongNhan();
            } else {
                themCongNhan();
            }
        }

        // Hàm chuyển đổi nút Thêm thành nút Sửa và ngược lại
        function toggleAddButtonToEditMode(isEditMode) {
            isSuaMode = isEditMode;
            const addButton = document.querySelector(".btn-mode");
            addButton.textContent = isEditMode ? "Sửa" : "Thêm";
        }

        // Hàm thêm công nhân vào danh sách
        function themCongNhan() {
            const hoDem = document.getElementById('hoDem').value;
            const ten = document.getElementById('ten').value;
            const namSinh = document.getElementById('namSinh').value;
            const gioiTinh = document.getElementById('gioiTinh').value;
            const soCMND = document.getElementById('soCMND').value;

            if (hoDem && ten && namSinh && gioiTinh && soCMND) {
                const congNhan = { hoDem, ten, namSinh, gioiTinh, soCMND };
                danhSachCongNhan.push(congNhan);
                renderDanhSachCongNhan();
                clearInputFields();
            } else {
                alert('Vui lòng điền đầy đủ thông tin công nhân.');
            }
        }

        // Hàm sửa thông tin công nhân
        function suaCongNhan() {
            if (selectedRowIndex >= 0) {
                const hoDem = document.getElementById('hoDem').value;
                const ten = document.getElementById('ten').value;
                const namSinh = document.getElementById('namSinh').value;
                const gioiTinh = document.getElementById('gioiTinh').value;
                const soCMND = document.getElementById('soCMND').value;

                if (hoDem && ten && namSinh && gioiTinh && soCMND) {
                    danhSachCongNhan[selectedRowIndex] = { hoDem, ten, namSinh, gioiTinh, soCMND };
                    renderDanhSachCongNhan();
                    clearInputFields();
                    toggleAddButtonToEditMode(false); // Chuyển về trạng thái thêm mới
                } else {
                    alert('Vui lòng điền đầy đủ thông tin công nhân.');
                }
            } else {
                alert('Vui lòng chọn một công nhân để sửa.');
            }
        }

        // Hàm xóa công nhân khỏi danh sách
        function xoaCongNhan() {
            if (selectedRowIndex >= 0) {
                danhSachCongNhan.splice(selectedRowIndex, 1);
                renderDanhSachCongNhan();
                clearInputFields();
                toggleAddButtonToEditMode(false); // Chuyển về trạng thái thêm mới
            } else {
                alert('Vui lòng chọn một công nhân để xóa.');
            }
        }

        // Hàm hiển thị danh sách công nhân trên giao diện
        function renderDanhSachCongNhan() {
            const tableBody = document.getElementById('danhSachCongNhan');
            tableBody.innerHTML = '';

            for (let i = 0; i < danhSachCongNhan.length; i++) {
                const congNhan = danhSachCongNhan[i];
                const row = tableBody.insertRow(-1);
                const sttCell = row.insertCell(0);
                const hoDemCell = row.insertCell(1);
                const tenCell = row.insertCell(2);
                const namSinhCell = row.insertCell(3);
                const gioiTinhCell = row.insertCell(4);
                const soCMNDCell = row.insertCell(5);
                const thaoTacCell = row.insertCell(6);

                sttCell.textContent = i + 1;
                hoDemCell.textContent = congNhan.hoDem;
                tenCell.textContent = congNhan.ten;
                namSinhCell.textContent = congNhan.namSinh;
                gioiTinhCell.textContent = congNhan.gioiTinh;
                soCMNDCell.textContent = congNhan.soCMND;

                // Tạo nút Sửa
                const suaButton = document.createElement('button');
                suaButton.textContent = 'Sửa';
                suaButton.onclick = function () {
                    selectedRowIndex = i;
                    document.getElementById('hoDem').value = congNhan.hoDem;
                    document.getElementById('ten').value = congNhan.ten;
                    document.getElementById('namSinh').value = congNhan.namSinh;
                    document.getElementById('gioiTinh').value = congNhan.gioiTinh;
                    document.getElementById('soCMND').value = congNhan.soCMND;
                    toggleAddButtonToEditMode(true); // Chuyển nút Thêm thành nút Sửa
                };
                thaoTacCell.appendChild(suaButton);

                // Tạo nút Xóa
                const xoaButton = document.createElement('button');
                xoaButton.textContent = 'Xóa';
                xoaButton.onclick = function () {
                    selectedRowIndex = i;
                    xoaCongNhan();
                };
                thaoTacCell.appendChild(xoaButton);
            }
        }

        // Hàm làm sạch các trường nhập liệu
        function clearInputFields() {
            document.getElementById('hoDem').value = '';
            document.getElementById('ten').value = '';
            document.getElementById('namSinh').value = '';
            document.getElementById('gioiTinh').value = 'Nam'; // Đặt giới tính mặc định là Nam
            document.getElementById('soCMND').value = '';

            selectedRowIndex = -1;
        }

        // Hiển thị danh sách công nhân khi trang web được tải
        renderDanhSachCongNhan();