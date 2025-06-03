// Function to fetch data from the server
async function fetchAnalyticsData() {
    const response = await fetch("http://localhost/New/Admin/index.php"); // Adjust URL to your setup
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    const data = await response.json();
    return data;
}

// Draw the chart
async function drawCharts() {
    try {
        const analyticsData = await fetchAnalyticsData();

        // Prepare data for the chart
        const labels = analyticsData.map(item => item.address); // Use address as labels
        const userIds = analyticsData.map(item => item.id); // Use IDs for the chart data

        // User Analytics Chart
        const ctx = document.getElementById('userAnalyticsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar', // Change to 'line' if needed
            data: {
                labels: labels,
                datasets: [{
                    label: 'User IDs',
                    data: userIds, // Replace with actual data for visualization
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } catch (error) {
        console.error('Error fetching analytics data:', error);
    }
}

// Call the function to draw charts
drawCharts();
