
<div class="add-poster mt-5">
    <h3 class="p-2">Manage Social Links</h3>
</div>

<div class="dashboard mb-5">
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($globalSocialLinks as $link)
                <tr>
                    <form action="{{ route('dashboard.sociallinks.update', $link->id) }}" method="POST" class="update-form">
                        @csrf
                        @method('PUT')
                        <td class="editable name" data-field="name">
                            <span class="text">{{ $link->name }}</span>
                            <input type="text" name="name" class="form-control d-none" value="{{ $link->name }}">
                        </td>
                        <td class="editable link" data-field="link">
                            <span class="text"><a href="{{ $link->link }}" target="_blank">{{ $link->link }}</a></span>
                            <input type="url" name="link" class="form-control d-none" value="{{ $link->link }}">
                        </td>
                        <td>
                            <button type="button" class="edit-btn"> <i class="fa-solid fa-pen"></i> Edit</button>
                            <button type="submit" class="save-btn btn btn-success btn-sm d-none">Save</button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".edit-btn").forEach(button => {
            button.addEventListener("click", function () {
                let row = this.closest("tr");
                let nameCell = row.querySelector(".name");
                let linkCell = row.querySelector(".link");
                let saveBtn = row.querySelector(".save-btn");

                // Show input fields & hide text
                nameCell.querySelector(".text").classList.add("d-none");
                nameCell.querySelector("input").classList.remove("d-none");

                linkCell.querySelector(".text").classList.add("d-none");
                linkCell.querySelector("input").classList.remove("d-none");

                // Show save button
                saveBtn.classList.remove("d-none");

                // Hide edit button
                this.classList.add("d-none");
            });
        });
    });
</script>

