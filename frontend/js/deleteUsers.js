document.addEventListener('DOMContentLoaded', () => {
    // Delete student
    document.querySelectorAll('#alunosTable .delete-btn').forEach(button => {
        button.addEventListener('click', async (e) => {
            const row = e.target.closest('tr');
            const id = row.getAttribute('data-id');
            if (confirm('Tem certeza que deseja excluir este aluno?')) {
                try {
                    const response = await fetch('backend/alunos/delete_aluno.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams({ id })
                    });
                    const result = await response.json();
                    if (result.success) {
                        row.remove();
                    } else {
                        alert('Erro ao excluir aluno: ' + (result.error || 'Erro desconhecido'));
                    }
                } catch (error) {
                    alert('Erro ao excluir aluno: ' + error.message);
                }
            }
        });
    });

    // Delete professor
    document.querySelectorAll('#professoresTable .delete-btn').forEach(button => {
        button.addEventListener('click', async (e) => {
            const row = e.target.closest('tr');
            const id = row.getAttribute('data-id');
            if (confirm('Tem certeza que deseja excluir este professor?')) {
                try {
                    const response = await fetch('backend/professores/delete_professor.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams({ id })
                    });
                    const result = await response.json();
                    if (result.success) {
                        row.remove();
                    } else {
                        alert('Erro ao excluir professor: ' + (result.error || 'Erro desconhecido'));
                    }
                } catch (error) {
                    alert('Erro ao excluir professor: ' + error.message);
                }
            }
        });
    });
});
