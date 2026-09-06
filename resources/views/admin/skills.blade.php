@extends('layouts.admin')

@section('title', 'Quản lý Kỹ năng')
@section('header_title', 'Danh sách Kỹ năng (Skills)')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0;">Tất cả kỹ năng</h3>
            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm mới</button>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Kỹ Năng</th>
                    <th>Nhóm (Category)</th>
                    <th>Mức độ (%)</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><strong>HTML5 & CSS3</strong></td>
                    <td><span style="background: #e0e7ff; color: var(--primary); padding: 4px 8px; border-radius: 4px; font-size: 0.85rem;">Frontend</span></td>
                    <td>90%</td>
                    <td>
                        <button class="btn" style="background: #f1f5f9; color: #334155; margin-right: 5px;"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><strong>PHP & Laravel</strong></td>
                    <td><span style="background: #dcfce7; color: #16a34a; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem;">Backend</span></td>
                    <td>85%</td>
                    <td>
                        <button class="btn" style="background: #f1f5f9; color: #334155; margin-right: 5px;"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><strong>Figma</strong></td>
                    <td><span style="background: #fef9c3; color: #ca8a04; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem;">Tools</span></td>
                    <td>70%</td>
                    <td>
                        <button class="btn" style="background: #f1f5f9; color: #334155; margin-right: 5px;"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
