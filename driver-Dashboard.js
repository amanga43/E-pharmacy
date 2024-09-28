function updateStatus(orderId, button) {
    if (!confirmUpdate()) {
        return; // If the user cancels, exit the function
    }

    const statusSelect = document.getElementById(`status-${orderId}`);
    const selectedStatus = statusSelect.value;

    // Alert the updated status
    alert(`Status of order ID ${orderId} updated to: ${selectedStatus}`);

    // Change button color to red
    button.style.backgroundColor = 'red'; // Make the button red

}

// Helper function to confirm status update
function confirmUpdate() {
    return confirm('Are you sure you want to update the status?');
}
