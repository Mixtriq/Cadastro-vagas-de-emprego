from django.urls import path, include
from rest_framework.routers import DefaultRouter
from .views import VagaViewSet
from django.contrib import admin
from django.urls import path, include
from .views import RegisterUserView

router = DefaultRouter()
router.register(r'vagas', VagaViewSet)

urlpatterns = [
    path('', include(router.urls)), 
    path('api/register/', RegisterUserView.as_view(), name='register'),
]
