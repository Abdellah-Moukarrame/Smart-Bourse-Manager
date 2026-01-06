<?php
class ExpenseRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Add Expense
    public function addExpense($title, $amount, $category, $date, $student_id)
    {
        // Table: depenses
        // Columns: id_depense, nom, categorie, id_user, price
        // Note: 'date' is passed but not in provided schema for 'depenses'. I will ignore it or assume schema is incomplete?
        // User provided: id_depense, nom, categorie, id_user, price.
        // Title -> nom, Amount -> price, Category -> categorie, StudentId -> id_user

        $stmt = $this->pdo->prepare("INSERT INTO depenses (nom, price, categorie, id_user) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$title, $amount, $category, $student_id]);
    }

    // Get Expenses by Student
    public function getExpensesByStudentId($student_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM depenses WHERE id_user = ? ORDER BY id_depense DESC");
        $stmt->execute([$student_id]);
        $expenses = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Return objects with expected properties for view compatibility if possible,
        // or update view. I'll map them here to standard object structure used in views.
        // View uses: title, amount, category_type, date, id

        $mappedExpenses = [];
        foreach ($expenses as $row) {
            $obj = new stdClass();
            $obj->id = $row->id_depense;
            $obj->title = $row->nom;
            $obj->amount = $row->price;
            $obj->category_type = $row->categorie;
            $obj->date = 'N/A'; // Date not in schema
            $mappedExpenses[] = $obj;
        }
        return $mappedExpenses;
    }

    public function getTotalSpentByStudent($student_id)
    {
        $stmt = $this->pdo->prepare("SELECT SUM(price) as total FROM depenses WHERE id_user = ?");
        $stmt->execute([$student_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function getSpentByCategoryType($student_id, $category)
    {
        $stmt = $this->pdo->prepare("SELECT SUM(price) as total FROM depenses WHERE id_user = ? AND categorie = ?");
        $stmt->execute([$student_id, $category]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
}
