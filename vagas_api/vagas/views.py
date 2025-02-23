from django.shortcuts import render

# Create your views here.

from rest_framework import viewsets
from .models import Vaga
from .serializers import VagaSerializer
from django.contrib.auth.models import User
from django.contrib.auth.hashers import make_password
from rest_framework import status
from rest_framework.response import Response
from rest_framework.views import APIView

class VagaViewSet(viewsets.ModelViewSet):
    queryset = Vaga.objects.all()
    serializer_class = VagaSerializer

class RegisterUserView(APIView):
    def post(self, request):
        # Obter os dados do formulário
        username = request.data.get('username')
        email = request.data.get('email')
        password = request.data.get('password')
        password_confirmation = request.data.get('password_confirmation')

        # Validar se as senhas coincidem
        if password != password_confirmation:
            return Response({"detail": "As senhas não coincidem."}, status=status.HTTP_400_BAD_REQUEST)

        # Criar o usuário
        user = User.objects.create(
            username=username,
            email=email,
            password=make_password(password)  # Salvar a senha de forma segura
        )

        user.save()

        return Response({"message": "Usuário registrado com sucesso!"}, status=status.HTTP_201_CREATED)