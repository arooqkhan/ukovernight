<style>
    .form-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 25px 30px;
        border-radius: 12px 12px 0 0;
        margin-bottom: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-header h3 {
        color: #ffffff;
        font-weight: 700;
        font-size: 1.5rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-header h3 i {
        font-size: 1.8rem;
    }

    .form-header .btn {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .form-header .btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        color: #ffffff;
    }

    .form-card {
        background: #ffffff;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 35px;
        border: 1px solid #e5e7eb;
    }

    .form-group-wrapper {
        position: relative;
        margin-bottom: 24px;
    }

    .form-group-wrapper label {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.9rem;
        margin-bottom: 8px;
        display: block;
    }

    .form-group-wrapper .form-control,
    .form-group-wrapper .form-select {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #ffffff;
    }

    .form-group-wrapper .form-control:focus,
    .form-group-wrapper .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .form-group-wrapper .form-control::placeholder {
        color: #94a3b8;
    }

    .input-icon-wrapper {
        position: relative;
    }

    .input-icon-wrapper i {
        display: none;
    }

    .input-icon-wrapper .form-control,
    .input-icon-wrapper .form-select {
        padding-left: 16px;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 35px;
        padding-top: 25px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: #ffffff;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        cursor: pointer;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        color: #ffffff;
    }

    .btn-back {
        background: #f1f5f9;
        border: 1px solid #e5e7eb;
        color: #475569;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-back:hover {
        background: #e2e8f0;
        color: #1e293b;
        text-decoration: none;
    }

    .text-danger {
        color: #ef4444;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }
</style>
