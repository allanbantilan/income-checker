<?php
include '../includes/auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Income</title>
    <link href="../output.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../datatable/jquery/datatable.min.css">

    <style>
        #productTable {
            border-collapse: collapse;
        }

        #productTable th,
        #productTable td {
            border: 1px solid #e2e8f0;
            /* Tailwind gray-200 */
        }

        #productTable thead {
            background-color: #f7fafc;
            /* Tailwind gray-100 */
        }

        #productTable tbody tr:nth-child(even) {
            background-color: #f9fafb;
            /* Tailwind gray-50 */
        }

        #productTable tbody tr:nth-child(odd) {
            background-color: #ffffff;
            /* White */
        }
    </style>

</head>

<body class="bg-gray-100 flex flex-col md:flex-row">

    <?php
    include '../includes/sidebar.php';
    include '../includes/main.php';
    ?>





    <div class="bg-white p-8 rounded-md w-full">
        <div class="flex items-center justify-between pb-6">
            <div>
                <h1 class="text-green-600 text-xl font-bold">Income</h1>
            </div>
            <div class="flex items-center justify-between">

                <div class="lg:ml-40 ml-10 space-x-8">
                    <button id="openModal" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Add
                    </button>
                </div>




                <!-- Modal Background -->
                <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 transition-opacity duration-300 opacity-0"></div>

                <!-- Modal -->
                <div id="modal" class="fixed inset-0 flex items-center justify-center hidden z-50 transform transition-all duration-300 scale-95 opacity-0">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl">
                        <div class="p-4 border-b">
                            <h2 class="text-lg font-semibold">Add Income</h2>
                        </div>
                        <div class="p-4">
                            <!-- Input Fields -->
                            <form action="../includes/add_income.php" method="POST" onsubmit="return validateForm()">
                                <!-- Error Message Container -->


                                <div class="mb-4 flex flex-wrap gap-4 items-start">
                                    <!-- Income From -->
                                    <div class="flex-1 min-w-[200px]">
                                        <label for="itemType" class="block text-sm font-medium text-gray-700">Income From :</label>
                                        <select id="itemType" name="itemType" class="mt-1 p-2 border rounded-md w-full">
                                            <option value="" disabled selected>Select item type</option>
                                            <option value="Print">Print</option>
                                            <option value="Laminate">Laminate</option>
                                            <option value="2x2 Picture">2x2 Picture</option>
                                            <option value="Other">Other</option>

                                        </select>
                                    </div>
                                    <!-- Amount Payed -->
                                    <div class="flex-1 min-w-[200px]">
                                        <label for="amount_payed" class="block text-sm font-medium text-gray-700">Amount Payed :</label>
                                        <input type="text" id="amount_payed" name="amount_payed" class="mt-1 p-2 border rounded-md w-full" placeholder="Enter amount">
                                    </div>
                                    <!-- Cost and Calculate Button -->
                                    <div class="flex-1 min-w-[200px] flex flex-col">
                                        <label for="cost" class="block text-sm font-medium text-gray-700">Cost :</label>
                                        <input type="text" id="cost" name="cost" class="mt-1 p-2 border rounded-md w-full" placeholder="Enter cost">
                                        <!-- Calculate Button -->
                                        <button type="button" onclick="calculateChange()" class="mt-2 bg-indigo-500 text-white px-4 py-2 rounded-md">Calculate</button>
                                    </div>
                                </div>

                                <div class="mb-4 flex flex-wrap gap-4 items-center">
                                    <!-- Change -->
                                    <div class="flex-1 min-w-[200px]">
                                        <label for="change" class="block text-sm font-medium text-gray-700">Change :</label>
                                        <input type="text" id="change" name="change" class="mt-1 p-2 border rounded-md w-full" placeholder="Calculated change" readonly>
                                    </div>
                                    <!-- Income -->
                                    <div class="flex-1 min-w-[200px]">
                                        <label for="income" class="block text-sm font-medium text-gray-700">Income :</label>
                                        <input type="text" id="income" name="income" class="mt-1 p-2 border rounded-md w-full" placeholder="Enter income" readonly>
                                    </div>
                                </div>
                                <div id="error-message" style="color: #b91c1c; background-color: #fee2e2;" class="hidden p-4 mb-4 rounded-md"></div>


                                <div class="p-4 border-t text-right">
                                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Add</button>
                                    <button id="closeModal" type="button" class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">Close</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- table -->
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table id="productTable" class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">INCOME ID</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">INCOME FROM</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">INCOME</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">DATE ACQUIRED</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ACTION</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../includes/db_connect.php';
                            $sql = "SELECT * FROM INCOME";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['income_id'] . "</td>";
                                    echo "<td>" . $row['income_type'] . "</td>";
                                    echo "<td>" . $row['income'] . "</td>";
                                    echo "<td>" . $row['income_date'] . "</td>";
                                    echo "<td>";
                                    echo "<div class='flex justify-center items-center space-x-4'>"; // Adjusted spacing to `space-x-4`

                                    // Edit button with icon, rounded corners, and centered alignment

                                    echo "<button type='submit' id='editBtn' class='edit-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md flex items-center' 
                                    data-id='" . $row['income_id'] . "' 
                                    data-item-type='" . $row['income_type'] . "' 
                                    data-income='" . $row['income'] . "'>";
                                    echo "<i class='fas fa-edit mr-2'></i>Edit";
                                    echo "</button>";


                                    // Delete Button with icon, rounded corners, and centered alignment
                                    echo "<button type='button' id='deleteBtn' class='delete-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md flex items-center' 
                                    data-id='" . $row['income_id'] . "'>";
                                    echo "<i class='fas fa-trash mr-2'></i>Delete";
                                    echo "</button>";

                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <button id="test-button" type="button">open sesame</button>
    <button id="test-close" type="button">close sesame</button>
    <div id="test" class="bg-blue-500 fixed inset-0 flex items-center justify-center hidden z-50 transform transition-all duration-300 scale-95 opacity-0">

        <h1 class="text-xl text-white">THIS IS THE MODAL NIGGA</h1>
        <button id="close-modal" type="button">Close</button>
    </div>

    <!-- // edit modal -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center hidden z-50 transform transition-all duration-300 scale-95 opacity-0">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl">
            <div class="p-4 border-b">
                <h2 class="text-lg font-semibold">Edit</h2>
            </div>
            <div class="p-4">
                <!-- Input Fields -->
                <form action="../includes/update_income.php" method="POST">
                    <!-- Error Message Container -->
                    <div class="mb-4 flex flex-wrap gap-4 items-start">
                        <!-- Income From -->
                        <div class="flex-1 min-w-[200px]">
                            <label for="itemType" class="block text-sm font-medium text-gray-700">Income From :</label>
                            <select id="editItemType" name="editItemType" class="mt-1 p-2 border rounded-md w-full">
                                <option value="" disabled selected>Select item type</option>
                                <option value="Print">Print</option>
                                <option value="Laminate">Laminate</option>
                                <option value="2x2 Picture">2x2 Picture</option>
                                <option value="Other">Other</option>

                            </select>
                        </div>
                        <input type="text" id="editId" name="editId" class="hidden">
                        <!-- Income -->
                        <div class="flex-1 min-w-[200px]">
                            <label for="income" class="block text-sm font-medium text-gray-700">Income :</label>
                            <input type="text" id="editIncome" name="editIncome" class="mt-1 p-2 border rounded-md w-full" placeholder="Enter income">
                        </div>

                    </div>
                    <div id="error-message" style="color: #b91c1c; background-color: #fee2e2;" class="hidden p-4 mb-4 rounded-md"></div>
                    <div class="p-4 border-t text-right">
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Update</button>
                        <button id="editCloseModal" type="button" class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">Close</button>
                    </div>
                </form>





            </div>
        </div>
    </div>

    <!-- delete modal  -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center hidden z-50 transform transition-all duration-300 scale-95 opacity-0">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl">
            <div class="p-4 border-b">
                <h2 class="text-lg font-semibold">Delete Confirmation</h2>
            </div>
            <form action="../includes/delete_income.php" method="POST">
                <div class="p-4">
                    <!-- Confirmation Message -->
                    <p class="text-gray-700">Are you sure you want to delete this record? This action cannot be undone, and the data will be erased forever.</p>
                    <input type="text" id="deleteId" name="deleteId" class="hidden">
                </div>
                <div class="p-4 border-t text-right">
                    <button id="confirmDelete" type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Yes, Delete</button>
                    <button id="deleteCloseModal" type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">No, Cancel</button>
                </div>
            </form>
        </div>
    </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('test-button');
            const modal = document.getElementById('test');
            const close = document.getElementById('close-modal')

            button.addEventListener('click', function() {

                modal.classList.remove('hidden');
                modalBackdrop.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0', 'scale-95');
                    modalBackdrop.classList.remove('opacity-0');
                    modal.classList.add('opacity-100', 'scale-100');
                    modalBackdrop.classList.add('opacity-100');
                }, 10);

            });

            close.addEventListener('click', function() {
                modal.classList.add('hidden');
                modalBackdrop.classList.remove('hidden');

                setTimeout(() => {
                    editModal.classList.add('hidden');
                    deleteModal.classList.add('hidden');
                    modal.classList.add('hidden');
                    modalBackdrop.classList.add('hidden');
                }, 300);
            });
        });
    </script>

    <script src="../script/jquery-3.6.0.min.js"></script>
    <script src="../script/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                'order': [
                    [0, 'desc']
                ]
            });
        });
    </script>


    <!-- edit modal script  -->
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize modal elements
            const editModal = document.getElementById('editModal');
            const modalBackdrop = document.getElementById('modalBackdrop'); // Assuming you have a backdrop

            // Show modal when any edit button is clicked
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    // Get the data from the button
                    const itemType = this.getAttribute('data-item-type');
                    const income = this.getAttribute('data-income');
                    const id = this.getAttribute('data-id');

                    // Populate the modal fields
                    document.getElementById('editItemType').value = itemType;
                    document.getElementById('editIncome').value = income;
                    document.getElementById('editId').value = id;

                    // Show the modal
                    editModal.classList.remove('hidden');
                    modalBackdrop.classList.remove('hidden');

                    setTimeout(() => {
                        editModal.classList.remove('opacity-0', 'scale-95');
                        modalBackdrop.classList.remove('opacity-0');
                        editModal.classList.add('opacity-100', 'scale-100');
                        modalBackdrop.classList.add('opacity-100');
                    }, 10);
                });
            });



            const deleteModal = document.getElementById('deleteModal');


            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {

                    const id = this.getAttribute('data-id');

                    document.getElementById('deleteId').value = id;

                    deleteModal.classList.remove('hidden');
                    modalBackdrop.classList.remove('hidden');

                    setTimeout(() => {
                        deleteModal.classList.remove('opacity-0', 'scale-95');
                        modalBackdrop.classList.remove('opacity-0');
                        editModal.classList.add('opacity-100', 'scale-100');
                        modalBackdrop.classList.add('opacity-100');
                    }, 10);

                })
            });





            //add modal
            const openModalBtn = document.getElementById('openModal');
            const closeModalBtn = document.getElementById('closeModal');
            const modal = document.getElementById('modal');


            //edit modal
            const editCloseBtn = document.getElementById('editCloseModal');

            //delete modal
            const deleteCloseBtn = document.getElementById('deleteCloseModal');

            openModalBtn.addEventListener('click', function() {
                modal.classList.remove('hidden');
                modalBackdrop.classList.remove('hidden');

                setTimeout(() => {
                    modal.classList.remove('opacity-0', 'scale-95');
                    modalBackdrop.classList.remove('opacity-0');
                    modal.classList.add('opacity-100', 'scale-100');
                    modalBackdrop.classList.add('opacity-100');
                }, 10);
            });

            function closeModal() {
                modal.classList.remove('opacity-100', 'scale-100');
                editModal.classList.remove('opacity-100', 'scale-100');
                deleteModal.classList.remove('opacity-100', 'scale-100');
                modalBackdrop.classList.remove('opacity-100');
                editModal.classList.add('opacity-0', 'scale-95');
                deleteModal.classList.add('opacity-0', 'scale-95');
                modal.classList.add('opacity-0', 'scale-95');
                modalBackdrop.classList.add('opacity-0');

                setTimeout(() => {
                    editModal.classList.add('hidden');
                    deleteModal.classList.add('hidden');
                    modal.classList.add('hidden');
                    modalBackdrop.classList.add('hidden');
                }, 300); // Matches the transition duration in Tailwind
            }
            // add
            closeModalBtn.addEventListener('click', closeModal);
            modalBackdrop.addEventListener('click', closeModal);
            //edit
            editCloseBtn.addEventListener('click', closeModal);
            //delete
            deleteCloseBtn.addEventListener('click', closeModal);
        });
    </script>


    <!-- calculate script  -->
    <script>
        function showError(message) {
            const errorMessageDiv = document.getElementById('error-message');
            errorMessageDiv.textContent = message;
            errorMessageDiv.classList.remove('hidden');
        }


        function calculateChange() {
            const amountPayed = parseInt(document.getElementById('amount_payed').value, 10);
            const cost = parseInt(document.getElementById('cost').value, 10);
            const itemType = document.getElementById('itemType').value;

            if (isNaN(amountPayed) || isNaN(cost)) {
                showError('Please enter valid numbers for Amount Payed and Cost.');
                return;
            }

            const change = amountPayed - cost;
            const income = cost; // Assuming income should be the same as amount payed

            document.getElementById('change').value = change;
            document.getElementById('income').value = income; // Set income value

            document.getElementById('error-message').classList.add('hidden');
        }

        function validateForm() {
            const itemType = document.getElementById('itemType').value;
            const amountPayed = document.getElementById('amount_payed').value;
            const cost = document.getElementById('cost').value;

            if (itemType === '' || amountPayed === '' || cost === '') {
                showError('All fields are required.');
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>

</body>

</html>