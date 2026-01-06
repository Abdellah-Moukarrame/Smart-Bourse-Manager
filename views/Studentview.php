<?php
$tips = [ "Create a monthly budget and stick to it.", "Track your spending to identify waste.", "Set financial goals (short and long term).", "Build an emergency fund with 3–6 months of expenses.", "Pay yourself first — save before spending.", "Avoid impulse purchases by waiting 24 hours.", "Use cash instead of credit for daily expenses.", "Automate savings and bill payments.", "Review subscriptions and cancel unused ones.", "Cook at home instead of eating out.", "Compare prices before making big purchases.", "Use public transport or carpool to save on fuel.", "Pay off high-interest debt first.", "Invest early to benefit from compound interest.", "Use budgeting apps to stay organized.", "Negotiate bills like insurance or phone plans.", "Avoid payday loans and quick cash schemes.", "Shop with a list to avoid overspending.", "Save windfalls like bonuses or tax refunds.", "Review your financial progress monthly." ]; // Pick 4 random tips $



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Bourse Manager</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 15px 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem 3rem;
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.nav-links {
    display: flex;
    gap: 2rem;
    align-items: center;
}
.btn-primary {
    background: #2563eb;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 600;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: #2563eb;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .view-toggle {
            display: flex;
            gap: 10px;
        }

        .view-btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: 2px solid #e5e7eb;
            background: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .view-btn.active {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .view-btn:hover:not(.active) {
            background: #f9fafb;
        }

        .dashboard {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            border-radius: 16px;
            padding: 40px;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3);
        }

        .dashboard h1 {
            font-size: 32px;
            margin-bottom: 30px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .stat-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            opacity: 0.9;
        }

        .stat-value {
            font-size: 42px;
            font-weight: 700;
        }

        .expenses-section {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .expenses-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .expenses-header h2 {
            font-size: 24px;
            color: #111827;
        }

        .add-btn {
            padding: 12px 24px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .add-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .expense-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .expense-card {
            padding: 25px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            transition: all 0.2s;
        }

        .expense-card:hover {
            border-color: #d1d5db;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }

        .expense-card.transport {
            border-left: 4px solid #3b82f6;
        }

        .expense-card.food {
            border-left: 4px solid #10b981;
        }

        .expense-card.books {
            border-left: 4px solid #f97316;
        }

        .expense-card.personal {
            border-left: 4px solid #8b5cf6;
        }

        .expense-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .transport .expense-icon {
            background: #dbeafe;
            color: #3b82f6;
        }

        .food .expense-icon {
            background: #d1fae5;
            color: #10b981;
        }

        .books .expense-icon {
            background: #ffedd5;
            color: #f97316;
        }

        .personal .expense-icon {
            background: #ede9fe;
            color: #8b5cf6;
        }

        .expense-name {
            font-size: 18px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 10px;
        }

        .expense-amount {
            font-size: 32px;
            font-weight: 700;
        }

        .transport .expense-amount {
            color: #3b82f6;
        }

        .food .expense-amount {
            color: #10b981;
        }

        .books .expense-amount {
            color: #f97316;
        }

        .personal .expense-amount {
            color: #8b5cf6;
        }

        .charts-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .chart-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .chart-card h3 {
            font-size: 20px;
            color: #111827;
            margin-bottom: 30px;
        }

        .pie-chart {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
        }

        .pie-svg {
            width: 250px;
            height: 250px;
        }

        .pie-labels {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .pie-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .pie-color {
            width: 16px;
            height: 16px;
            border-radius: 3px;
        }

        .bar-chart {
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            height: 300px;
            padding: 20px 0;
            position: relative;
        }

        .bar-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            flex: 1;
        }

        .bars {
            display: flex;
            gap: 8px;
            align-items: flex-end;
            height: 250px;
        }

        .bar {
            width: 40px;
            border-radius: 6px 6px 0 0;
            transition: all 0.3s;
        }

        .bar:hover {
            opacity: 0.8;
        }

        .bar.your-spending {
            background: #2563eb;
        }

        .bar.average {
            background: #10b981;
        }

        .bar-label {
            font-size: 13px;
            color: #6b7280;
            font-weight: 500;
        }

        .chart-legend {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 2px;
        }

        .tips-section {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            padding: 30px;
            border-radius: 16px;
            margin-top: 30px;
        }

        .tips-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .tips-icon {
            font-size: 28px;
            color: #10b981;
        }

        .tips-header h3 {
            font-size: 22px;
            color: #065f46;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 15px;
        }

        .tip-card {
            background: white;
            padding: 18px 22px;
            border-radius: 12px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .tip-icon {
            font-size: 20px;
            flex-shrink: 0;
        }

        .tip-text {
            color: #374151;
            font-size: 14px;
            line-height: 1.5;
        }

        .recent-expenses {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-top: 30px;
        }

        .recent-expenses h3 {
            font-size: 22px;
            color: #111827;
            margin-bottom: 25px;
        }

        .expense-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .expense-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background: #f9fafb;
            border-radius: 12px;
            transition: all 0.2s;
            cursor: pointer;
        }

        .expense-item:hover {
            background: #f3f4f6;
            transform: translateX(4px);
        }

        .expense-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .expense-item-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .expense-item.personal-expense .expense-item-icon {
            background: #ede9fe;
            color: #8b5cf6;
        }

        .expense-item.books-expense .expense-item-icon {
            background: #ffedd5;
            color: #f97316;
        }

        .expense-item.food-expense .expense-item-icon {
            background: #d1fae5;
            color: #10b981;
        }

        .expense-item.transport-expense .expense-item-icon {
            background: #dbeafe;
            color: #3b82f6;
        }

        .expense-details h4 {
            font-size: 16px;
            color: #111827;
            margin-bottom: 4px;
            font-weight: 600;
        }

        .expense-meta {
            font-size: 13px;
            color: #6b7280;
        }

        .expense-amount-large {
            font-size: 20px;
            font-weight: 700;
        }

        .expense-item.personal-expense .expense-amount-large {
            color: #8b5cf6;
        }

        .expense-item.books-expense .expense-amount-large {
            color: #f97316;
        }

        .expense-item.food-expense .expense-amount-large {
            color: #10b981;
        }

        .expense-item.transport-expense .expense-amount-large {
            color: #3b82f6;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <div class="logo-icon">🎓</div>
            <span>SmartBoursePlanner</span>
        </div>
        <div class="nav-links">
            <a href="./auth/login.php">Login</a>
            <a href="./auth/register.php">Signup</a>
            <a href="">Profile</a>
            <a href="#start" class="btn-primary">
                Get Started →
            </a>
        </div>
    </nav>

    <div class="dashboard">
        <h1>Smart Bourse Manager</h1>
        <div class="stats">
            <div class="stat-item">
                <div class="stat-label">
                    <span>📅</span>
                    <span>Monthly Scholarship</span>
                </div>
                <div class="stat-value">1000 DH</div>
            </div>
            <div class="stat-item">
                <div class="stat-label">
                    <span>💰</span>
                    <span>Remaining Balance</span>
                </div>
                <div class="stat-value">370 DH</div>
            </div>
            <div class="stat-item">
                <div class="stat-label">
                    <span>📊</span>
                    <span>Total Spent</span>
                </div>
                <div class="stat-value">630 DH</div>
            </div>
        </div>
    </div>

    <div class="expenses-section">
        <div class="expenses-header">
            <h2>Expense Categories</h2>
            <button class="add-btn">
                <span>+</span>
                <span>Add Expense</span>
            </button>
        </div>
        <div class="expense-grid">
            <div class="expense-card transport">
                <div class="expense-icon">🚌</div>
                <div class="expense-name">Transport</div>
                <div class="expense-amount">150 DH</div>
            </div>
            <div class="expense-card food">
                <div class="expense-icon">☕</div>
                <div class="expense-name">Food</div>
                <div class="expense-amount">280 DH</div>
            </div>
            <div class="expense-card books">
                <div class="expense-icon">📚</div>
                <div class="expense-name">Books & Supplies</div>
                <div class="expense-amount">120 DH</div>
            </div>
            <div class="expense-card personal">
                <div class="expense-icon">👤</div>
                <div class="expense-name">Personal</div>
                <div class="expense-amount">80 DH</div>
            </div>
        </div>
    </div>

    <div class="charts-section">
        <div class="chart-card">
            <h3>Expense Distribution</h3>
            <div class="pie-chart">
                <svg class="pie-svg" viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#3b82f6" stroke-width="20" 
                            stroke-dasharray="60 340" transform="rotate(-90 50 50)"/>
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#10b981" stroke-width="20" 
                            stroke-dasharray="110 290" stroke-dashoffset="-60" transform="rotate(-90 50 50)"/>
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#f97316" stroke-width="20" 
                            stroke-dasharray="48 352" stroke-dashoffset="-170" transform="rotate(-90 50 50)"/>
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#8b5cf6" stroke-width="20" 
                            stroke-dasharray="32 368" stroke-dashoffset="-218" transform="rotate(-90 50 50)"/>
                </svg>
                <div class="pie-labels">
                    <div class="pie-label">
                        <div class="pie-color" style="background: #3b82f6;"></div>
                        <span><strong>Transport:</strong> 24%</span>
                    </div>
                    <div class="pie-label">
                        <div class="pie-color" style="background: #10b981;"></div>
                        <span><strong>Food:</strong> 44%</span>
                    </div>
                    <div class="pie-label">
                        <div class="pie-color" style="background: #f97316;"></div>
                        <span><strong>Books & Supplies:</strong> 19%</span>
                    </div>
                    <div class="pie-label">
                        <div class="pie-color" style="background: #8b5cf6;"></div>
                        <span><strong>Personal:</strong> 13%</span>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <div class="tips-section">
        <div class="tips-header">
            <span class="tips-icon">💡</span>
            <h3>Smart Spending Tips</h3>
        </div>
        <div class="tips-grid">
            <?php $randomTips = array_rand($tips, 4); ?>
            <div class="tip-card">
                <span class="tip-icon">💡</span>
                <p class="tip-text"><?=  array_rand($tips, 1); ?></p>
            </div>
            <div class="tip-card">
                <span class="tip-icon">🎯</span>
                <p class="tip-text"><?=  array_rand($tips, 1); ?></p>
            </div>
            <div class="tip-card">
                <span class="tip-icon">📚</span>
                <p class="tip-text"><?=  array_rand($tips, 1); ?></p>
            </div>
            <div class="tip-card">
                <span class="tip-icon">👍</span>
                <p class="tip-text"><?=  array_rand($tips, 1); ?></p>
            </div>
        </div>
    </div>

    <div class="recent-expenses">
        <h3>Recent Expenses</h3>
        <div class="expense-list">
            <div class="expense-item personal-expense">
                <div class="expense-left">
                    <div class="expense-item-icon">👤</div>
                    <div class="expense-details">
                        <h4>Misc expenses</h4>
                        <div class="expense-meta">Personal • 2026-01-05</div>
                    </div>
                </div>
                <div class="expense-amount-large">80 DH</div>
            </div>

            <div class="expense-item books-expense">
                <div class="expense-left">
                    <div class="expense-item-icon">📚</div>
                    <div class="expense-details">
                        <h4>Textbooks</h4>
                        <div class="expense-meta">Books & Supplies • 2026-01-04</div>
                    </div>
                </div>
                <div class="expense-amount-large">120 DH</div>
            </div>

            <div class="expense-item food-expense">
                <div class="expense-left">
                    <div class="expense-item-icon">☕</div>
                    <div class="expense-details">
                        <h4>Groceries</h4>
                        <div class="expense-meta">Food • 2026-01-03</div>
                    </div>
                </div>
                <div class="expense-amount-large">280 DH</div>
            </div>

            <div class="expense-item transport-expense">
                <div class="expense-left">
                    <div class="expense-item-icon">🚌</div>
                    <div class="expense-details">
                        <h4>Monthly bus pass</h4>
                        <div class="expense-meta">Transport • 2026-01-02</div>
                    </div>
                </div>
                <div class="expense-amount-large">150 DH</div>
            </div>
        </div>
    </div>
</body>
</html>